<?php

namespace App\Http\Requests;

use App\Models\Player;
use Illuminate\Foundation\Http\FormRequest;

class TournamentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'players' => 'required|array',
            'gender' => 'required|integer|between:0,1',
            'number_of_rounds' => 'required|integer|between:1,7',
        ];
    }

    public function messages()
    {
        return [
            'Title' => 'Tournament title missing.',
            'players' => 'List of players missing.',
            'gender' => 'Gender of the tournament missing. 0 for female, 1 for male.',
            'number_of_rounds' => 'Number of rounds for the tournament missing.'
        ];
    }

    protected function getValidatorInstance()
    {
        return parent::getValidatorInstance()->after(function ($validator) {
            $this->after($validator);
        });
    }

    private function after($validator)
    {
        $players = request()->get('players');
        $gender = request()->get('gender');
        $number_of_rounds = request()->get('number_of_rounds');
        if ($validator->errors()->isEmpty()) {
            $players_required = pow(2, $number_of_rounds);
            if ($players_required !== count($players)) {
                $validator->errors()->add('number_of_players', 'The number of players does not satisfy the number of tournament rounds. For ' . $number_of_rounds . ' rounds must be ' . $players_required . ' players');
            }


            $players_not_found = array();
            $players_mismatch_gender = array();
            foreach ($players as $player) {
                $participant = Player::findOrFail($player);
                if(!isset($participant)){
                    $players_not_found[]=$player;
                }elseif ($gender != $participant->gender) {
                    var_dump($participant->gender);
                    die();
                    $players_mismatch_gender[] = $participant->id;
                }
            }
            if (count($players_mismatch_gender) > 0) {
                $validator->errors()->add('players_gender', 'This players' . json_encode($players_mismatch_gender) . ' mismatch the tournament gender');
            }
            if(count($players_not_found)>0){
                $validator->errors()->add('players_not_found', 'This players' . json_encode($players_not_found) . ' does not exists in database');
            }
        }
    }
}

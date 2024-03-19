<?php

namespace App\Livewire;

use App\Models\SalesCommission;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Dashboard extends Component
{

    public $config;
    public string $question;
    public array $dataset;

    public function render()
    {
        return view('livewire.dashboard');
    }

    protected $rules = [
        'question' => 'required|min:10'
    ];

    public function generateReport() {

        $this->validate();

        $fields = implode(',',SalesCommission::getColumns());

        $this->config =  OpenAI::completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => "Considerando a lista de campos ($fields), gere uma configuração json do Vega-lite v5 (sem campo de dados e com descrição) que atenda o seguinte pedido {$this->question}. Resposta:",
            'max_tokens' => 1500
        ])->choices[0]->text;

        $this->config = str_replace("\n", "", $this->config);
        $this->config = json_decode($this->config, true);

        $this->dataset = ["values" => SalesCommission::inRandomOrder()->limit(100)->get()->toArray()];

        return $this->config;
    }
}

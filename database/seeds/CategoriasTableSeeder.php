<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['cat_nome' => 'Administração e Negócios'],
            ['cat_nome' => 'Animais'],
            ['cat_nome' => 'Artes e Música'],
            ['cat_nome' => 'Auto Ajuda e Similares'],
            ['cat_nome' => 'Beleza'],
            ['cat_nome' => 'Blogs e Redes Sociais'],
            ['cat_nome' => 'Casa, Jardinagem e Similares'],
            ['cat_nome' => 'Culinária e Gastronomia'],
            ['cat_nome' => 'Design de Templates'],
            ['cat_nome' => 'Edições Audivisuais'],
            ['cat_nome' => 'Esporte e Fitness'],
            ['cat_nome' => 'Educacional Profissionalizante'],
            ['cat_nome' => 'Entretenimento e Diversão'],
            ['cat_nome' => 'Informática'],
            ['cat_nome' => 'Idiomas'],
            ['cat_nome' => 'Internet Marketing'],
            ['cat_nome' => 'Investimento e Finanças'],
            ['cat_nome' => 'Jurídico'],
            ['cat_nome' => 'Marketing de Rede'],
            ['cat_nome' => 'Moda e Vestuário'],
            ['cat_nome' => 'Paquera e Relacionamentos'],
            ['cat_nome' => 'Plugins, Widgets e Similares'],
            ['cat_nome' => 'Produtos Infantis'],
            ['cat_nome' => 'Religiões e crenças'],
            ['cat_nome' => 'Saúde'],
            ['cat_nome' => 'Turismo'],
            ['cat_nome' => 'Sexologia e Sexualidade'],
            ['cat_nome' => 'Outros Segmentos']
        ];

        Categoria::insert($categories);
    }
}

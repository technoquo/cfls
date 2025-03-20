<?php 
namespace App\View\Composers;

use App\Models\Company; // Asegúrate de que el namespace sea correcto
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        $data = Company::first();
        if (!$data) {
            $data = new Company();
            $data->image = 'default/image.png'; // Imagen por defecto
        }
        $image = $data->image;

        $view->with('logo', $image); // Comparte el logo con la vista
    }
}
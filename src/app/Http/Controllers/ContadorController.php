<?php

namespace App\Http\Controllers;
use App\Traits\ToastTrigger;

use Illuminate\Http\Request;

// ContadorController.php


class ContadorController extends Controller
{
    use ToastTrigger;

    public function incrementar($número)
    {
        if ($número < 10) {
            $número++;
            $this->alert('Precaución: número incrementado');
        } else {
            $this->errorToast('El número no puede ser mayor que 10');
        }

        return view('contador', ['número' => $número]);
    }

    public function decrementar($número)
    {
        if ($número > 0) {
            $número--;
            $this->alert('Número decrementado');  // Mostramos la alerta
        } else {
            $this->errorToast('El número no puede ser menor que 0');
        }

        return view('contador', ['número' => $número]);
    }

    public function reset()
    {
        $número = 0;
        $this->alert('Contador reiniciado');  // Mostramos la alerta
        return view('contador', ['número' => $número]);
    }

    public function duplicar($número)
    {
        $número = min($número * 2, 10); // Duplicar, pero con un límite de 10
        $this->alert('Número duplicado a ' . $número);  // Mostrar la alerta de duplicación

        return view('contador', ['número' => $número]);
    }
}



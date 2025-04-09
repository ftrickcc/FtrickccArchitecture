<?php

namespace App\Services;

use MoonShine\Contracts\ColorManager\ColorManagerContract;

class ThemeApplier
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ColorManagerContract $colorManager) {}


    public function theme1(): void
    {
        $this->colorManager->background('#17202a')
            ->content('#1c2833')
            ->tableRow('#212f3c')
            ->borders('#34495e')
            ->buttons('#34495e')
            ->dividers('#5d6d7e')
            ->primary('#ca6f1e')
            ->secondary('#f5b041')
            ->successBg('#117a65')
            ->successText('#82e0aa')
            ->warningBg('#b7950b')
            ->warningText('#f7dc6f')
            ->errorBg('#7b241c')
            ->errorText('#f5b7b1')
            ->infoBg('#21618c')
            ->infoText('#85c1e9');

        $this->colorManager->successBg('#1e8449')
            ->successBg('#117a65', dark: true)
            ->successText('#82e0aa', dark: true)
            ->warningBg('#b7950b', dark: true)
            ->warningText('#f7dc6f', dark: true)
            ->errorBg('#a93226', dark: true)
            ->errorText('#f5b7b1',  dark: true)
            ->infoBg('#21618c', dark: true)
            ->infoText('#85c1e9', dark: true);
    }

    public function theme2(): void
    {
    // Modo claro (solo cambios en líneas e iconos)
    $this->colorManager->background('#000957')
                ->content('#000241') // tal cual
                ->tableRow('#000241')
                ->borders('#070822')       // Líneas cambiadas a celeste claro
                ->buttons('#344CB7')      // Iconos/botones en celeste claro
                ->dividers('#0a0a0a')     // Divisores en celeste claro
                ->primary('#cbb348')
                ->secondary('#000000')
                ->successBg('#239B56')
                ->successText('#D1F2EB')
                ->warningBg('#cc0605')
                ->warningText('#cccccc')
                ->errorBg('#C0392B')
                ->errorText('#FADBD8')
                ->infoBg('#577BC1')
                ->infoText('#EAF2F8');

    // Modo oscuro (ajustes sin amarillo)
    $this->colorManager->successBg('#239B56', dark: true)
                ->successText('#D1F2EB', dark: true)
                ->warningBg('#cc0605', dark: true)  // Amarillo reemplazado por plomo-azul
                ->warningText('#cccccc', dark: true) // Texto en celeste
                ->errorBg('#C0392B', dark: true)
                ->errorText('#FADBD8', dark: true)
                ->infoBg('#577BC1', dark: true)
                ->infoText('#EAF2F8', dark: true);           
    }

}

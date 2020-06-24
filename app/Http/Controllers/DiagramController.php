<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function index(){

        $waiting = \DB::table('appointments')->where('status', '1')->count();
        $Refuse = \DB::table('appointments')->where('status', '2')->count();
        $Accept = \DB::table('appointments')->where('status', '0')->count();

        $states = \Lava::DataTable();

        $states->addStringColumn('States')
                ->addNumberColumn('Percent')
                ->addRow(['Accepté', $Accept])
                ->addRow(['refusé', $Refuse])
                ->addRow(['En attente', $waiting]);

                \Lava::DonutChart('apointementstates', $states, [
            'title' => 'Etat des rendez-vous'
        ]);

        $plastics = \DB::table('material')->where('material', '1')->get();
        $i = 0;

        $plasticAmount = \Lava::DataTable();

        $plasticAmount->addNumberColumn('temps')
            ->addNumberColumn('quantité de plastic');
            
            foreach ($plastics as $plastic) {
                $i++;
                $plasticAmount->addRow([$i, $plastic->amount]);
            }

            \Lava::AreaChart('PlasticAmount', $plasticAmount, [
            'title' => 'quantité de plastique',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return view("account");
    }
}

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
            ->addNumberColumn('quantité de plastique');
            
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

        $papers = \DB::table('material')->where('material', '2')->get();
        $i = 0;

        $paperAmount = \Lava::DataTable();

        $paperAmount->addNumberColumn('temps')
            ->addNumberColumn('quantité de papier carton');
            
            foreach ($papers as $paper) {
                $i++;
                $paperAmount->addRow([$i, $paper->amount]);
            }

            \Lava::AreaChart('PaperAmount', $paperAmount, [
            'title' => 'quantité de papier carton',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        $plexyglasss = \DB::table('material')->where('material', '3')->get();
        $i = 0;

        $plexyglassAmount = \Lava::DataTable();

        $plexyglassAmount->addNumberColumn('temps')
            ->addNumberColumn('quantité de plexiglass');
            
            foreach ($plexyglasss as $plexyglass) {
                $i++;
                $plexyglassAmount->addRow([$i, $plexyglass->amount]);
            }

            \Lava::AreaChart('PlexyglassAmount', $plexyglassAmount, [
            'title' => 'quantité de plexiglass',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        $MDFs = \DB::table('material')->where('material', '4')->get();
        $i = 0;

        $MDFAmount = \Lava::DataTable();

        $MDFAmount->addNumberColumn('temps')
            ->addNumberColumn('quantité de MDF');
            
            foreach ($MDFs as $MDF) {
                $i++;
                $MDFAmount->addRow([$i, $MDF->amount]);
            }

            \Lava::AreaChart('MDFAmount', $MDFAmount, [
            'title' => 'quantité de MDF',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return view("account");
    }
}

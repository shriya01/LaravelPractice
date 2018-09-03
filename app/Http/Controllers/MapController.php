<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;

class MapController extends Controller
{
    /**
     * Displays map view
     *
     * @return \Illuminate\View\View
     */
    public function map()
    {
        //setting the config
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';
        $config['geocodeCaching'] = true;
        //creating gmap object and initializing it
        $gmap = new GMaps();
        $gmap->initialize($config);
        //creating marker
        $marker['position'] = 'Sydney Airport,Sydney';
        $marker['infowindow_content'] = 'Sydney Airport,Sydney';
        //adding marker
        $gmap->add_marker($marker);
        //creating marker
        $marker['position'] = 'Kogarah Golf Club,Sydney';
        $marker['infowindow_content'] = 'Kogarah Golf Club,Sydney';
        //adding marker
        $gmap->add_marker($marker);
        //creating marker
        $marker['position'] = 'The Lakes Golf Club,Sydney';
        $marker['infowindow_content'] = 'The Lakes Golf Club,Sydney';
        //adding marker
        $gmap->add_marker($marker);
        //loading map
        $map = $gmap->create_map();
        //adding it to view
        return view('map', compact('map'));
    }
    /**
     * @DateOfCreation      3 Sept 2018
     * @ShortDescritpion    Displays map direction view with respective data
     *
     * @return              \Illuminate\View\View
     */
    public function direction()
    {
        //Setting The Config
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '500px';
        $config['geocodeCaching'] = true;
        $config['directions'] = true;
        $config['directionsStart'] = 'Sydney Airport,Sydney';
        $config['directionsEnd'] = 'Kogarah Golf Club,Sydney';
        $config['directionsDivID'] =  'directionsDiv';
        // creating object of GMaps
        $gmap = new GMaps();
        //initialize gmap object by passing config to initialize method
        $gmap->initialize($config);
        //create map
        $map = $gmap->create_map();
        //add map to view
        return view('map', compact('map'));
    }
}

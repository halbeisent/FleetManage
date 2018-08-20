<?php

session_start();

$vehicles = new vehicles();

$vehiclesList = $vehicles->getVehiclesList();

session_write_close();
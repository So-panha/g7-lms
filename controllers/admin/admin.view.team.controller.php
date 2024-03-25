<?php
// require database
require 'database/database.php';
require 'models/admin.model.php';

// If get not enough
if(isset($_GET['id'])){      
    // Get id user
    $managerId = $_GET['id'];
    // team memebers
    $groupMemberManager =  groupPeopleManager($managerId);
    // team memebers
    $groupMembers =  groupPeople($managerId);
    // Manager team
    $manager = Groupmanager($managerId);
}

require 'views/admin/admin.view.team.view.php';
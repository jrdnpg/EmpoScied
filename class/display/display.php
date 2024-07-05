<?php

    require_once "../config/config.php";


    /**
    * 
    */
    class display
    {
        
      function display_room()
{
    global $conn;
    $sql = $conn->prepare("SELECT * FROM room WHERE rm_status = ?");
    $sql->execute(array(1));
    $count = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $myname = $value['rm_name'];

            $button1 =  '<div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;" class="edit-room"><i class="fa fa-edit"></i> Edit</a></li>
                            </ul>
                        </div>';

            $button2 =  '<div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="room_info?name=' . $myname . '&id=' . $value["id"] . '"><i class="fa fa-search"></i> View equipments</a></li>
                                <li><a href="javascript:;" class="edit-room"><i class="fa fa-edit"></i> Edit</a></li>
                            </ul>
                        </div>';

            // Use $button1 or $button2 based on your requirement
            $button =  $button1;

            $data['data'][] = array(ucwords($value['rm_name']), $button, $value['id']);
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}

public function cancelled_reservation()
{
    global $conn;

    $sql = $conn->prepare('SELECT *, reservation.status as stat, GROUP_CONCAT(item.i_deviceID, " - ", item.i_model, "<br/>") item_borrow 
                            FROM reservation
                            LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
                            LEFT JOIN item ON item.id = item_stock.item_id
                            LEFT JOIN member ON member.id = reservation.member_id
                            LEFT JOIN room ON room.id = reservation.assign_room
                            LEFT JOIN reservation_status ON reservation_status.reservation_code = reservation.reservation_code
                            WHERE reservation.status = 2 /* Assuming 2 is the status code for "Cancelled" */
                            GROUP BY reservation.reservation_code');
    
    $sql->execute();
    $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
    $count = $sql->rowCount();

    if ($count > 0) {
        $data['data'] = array();

        foreach ($fetch as $key => $value) {
            if ($value['stat'] == 2) {
                $status = '<span class="badge bg-danger">Cancelled</span>';
            }

            $date = date('F d,Y H:i:s A', strtotime($value['m_fname'] . ' ' . $value['m_lname']));
            $data['data'][] = array($date, $value['item_borrow'], ucwords($value['rm_name']), $value['remark'], $value['m_fname'] . ' ' . $value['m_lname']);
        }

        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


   public function display_member()
{
    global $conn; 
    $sql = $conn->prepare("SELECT * FROM member ORDER BY m_year_section DESC");
    $sql->execute();
    $count = $sql->rowCount();
    $fetch = $sql->fetchAll();
    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $status = ($value['m_status'] == 1) ? '<a href="javascript:;" class="deactivate-member"><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-member"><i class="fa fa-remove"></i> activate</a>';
            
            // Set color based on activation status
            $nameColor = ($value['m_status'] == 1) ? 'blue' : 'red';

            $button =   '<div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;" class="edit-member"><i class="fa fa-edit"></i> Edit</a></li>
                                <li>'.$status.'</li>
                                <li><a href="member_profile?id='.$value['id'].'"><i class="fa fa-user"></i> '.$value['m_fname'].' '.$value['m_lname'].'</a></li>
                            </ul>
                        </div>';

            // Add name and its color to the data array
            $data['data'][] = array(
                $value['m_school_id'],
                '<span style="color:'.$nameColor.'">'.$value['m_fname'].' '.$value['m_lname'].'</span>',
                $value['m_gender'],
                $value['m_contact'],
                $value['m_department'],
                $value['m_year_section'],
                $value['m_type'],
                $button,
                $value['m_fname'],
                $value['m_lname'],
                $value['id']
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}



// public function display_mem2()
// {
//     global $conn; 
//     $sql = $conn->prepare("SELECT * FROM member WHERE m_year_section LIKE '%2nd%'");
//     $sql->execute();
//     $count = $sql->rowCount();
//     $fetch = $sql->fetchAll();
//     if ($count > 0) {
//         foreach ($fetch as $key => $value) {
//             $status = ($value['m_status'] == 1) ? '<a href="javascript:;" class="deactivate-member" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-member" ><i class="fa fa-remove"></i> activate</a>' ;
//             $button = '<div class="btn-group">
//                             <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                                 Action <span class="caret"></span>
//                             </button>
//                             <ul class="dropdown-menu">
//                                 <li><a href="javascript:;" class="edit-member" ><i class="fa fa-edit"></i> Edit</a></li>
//                                 <li>'.$status.'</li>
//                                 <li><a href="member_profile?id='.$value['id'].'&name='.$value['m_fname'].' '.$value['m_lname'].'"><i class="fa fa-user"></i> Borrower Profile</a></li>
//                             </ul>
//                         </div>';

//             $data['data'][] = array(
//                 $value['m_school_id'],
//                 $value['m_fname'].' '.$value['m_lname'],
//                 $value['m_gender'],
//                 $value['m_contact'],
//                 $value['m_department'],
//                 $value['m_year_section'],
//                 $value['m_type'],
//                 $button,
//                 $value['m_fname'],
//                 $value['m_lname'],
//                 $value['id']
//             );
//         }
//         echo json_encode($data);
//     } else {
//         $data['data'] = array();
//         echo json_encode($data);
//     }
// }

// public function display_mem3()
// {
//     global $conn; 
//     $sql = $conn->prepare("SELECT * FROM member WHERE m_year_section LIKE '%3rd%'");
//     $sql->execute();
//     $count = $sql->rowCount();
//     $fetch = $sql->fetchAll();
//     if ($count > 0) {
//         foreach ($fetch as $key => $value) {
//             $status = ($value['m_status'] == 1) ? '<a href="javascript:;" class="deactivate-member" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-member" ><i class="fa fa-remove"></i> activate</a>' ;
//             $button = '<div class="btn-group">
//                             <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                                 Action <span class="caret"></span>
//                             </button>
//                             <ul class="dropdown-menu">
//                                 <li><a href="javascript:;" class="edit-member" ><i class="fa fa-edit"></i> Edit</a></li>
//                                 <li>'.$status.'</li>
//                                 <li><a href="member_profile?id='.$value['id'].'&name='.$value['m_fname'].' '.$value['m_lname'].'"><i class="fa fa-user"></i> Borrower Profile</a></li>
//                             </ul>
//                         </div>';

//             $data['data'][] = array(
//                 $value['m_school_id'],
//                 $value['m_fname'].' '.$value['m_lname'],
//                 $value['m_gender'],
//                 $value['m_contact'],
//                 $value['m_department'],
//                 $value['m_year_section'],
//                 $value['m_type'],
//                 $button,
//                 $value['m_fname'],
//                 $value['m_lname'],
//                 $value['id']
//             );
//         }
//         echo json_encode($data);
//     } else {
//         $data['data'] = array();
//         echo json_encode($data);
//     }
// }


// public function display_mem4()
// {
//     global $conn; 
//     $sql = $conn->prepare("SELECT * FROM member WHERE m_year_section LIKE '%4th%'");
//     $sql->execute();
//     $count = $sql->rowCount();
//     $fetch = $sql->fetchAll();
//     if ($count > 0) {
//         foreach ($fetch as $key => $value) {
//             $status = ($value['m_status'] == 1) ? '<a href="javascript:;" class="deactivate-member" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-member" ><i class="fa fa-remove"></i> activate</a>' ;
//             $button = '<div class="btn-group">
//                             <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                                 Action <span class="caret"></span>
//                             </button>
//                             <ul class="dropdown-menu">
//                                 <li><a href="javascript:;" class="edit-member" ><i class="fa fa-edit"></i> Edit</a></li>
//                                 <li>'.$status.'</li>
//                                 <li><a href="member_profile?id='.$value['id'].'&name='.$value['m_fname'].' '.$value['m_lname'].'"><i class="fa fa-user"></i> Borrower Profile</a></li>
//                             </ul>
//                         </div>';

//             $data['data'][] = array(
//                 $value['m_school_id'],
//                 $value['m_fname'].' '.$value['m_lname'],
//                 $value['m_gender'],
//                 $value['m_contact'],
//                 $value['m_department'],
//                 $value['m_year_section'],
//                 $value['m_type'],
//                 $button,
//                 $value['m_fname'],
//                 $value['m_lname'],
//                 $value['id']
//             );
//         }
//         echo json_encode($data);
//     } else {
//         $data['data'] = array();
//         echo json_encode($data);
//     }
// }

// public function display_mem5()
// {
//      global $conn; 
//     $sql = $conn->prepare("SELECT * FROM member WHERE m_type LIKE '%faculty%'");
//     $sql->execute();
//     $count = $sql->rowCount();
//     $fetch = $sql->fetchAll();
//     if ($count > 0) {
//         foreach ($fetch as $key => $value) {
//             $status = ($value['m_status'] == 1) ? '<a href="javascript:;" class="deactivate-member" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-member" ><i class="fa fa-remove"></i> activate</a>' ;
//             $button = '<div class="btn-group">
//                             <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                                 Action <span class="caret"></span>
//                             </button>
//                             <ul class="dropdown-menu">
//                                 <li><a href="javascript:;" class="edit-member" ><i class="fa fa-edit"></i> Edit</a></li>
//                                 <li>'.$status.'</li>
//                                 <li><a href="member_profile?id='.$value['id'].'&name='.$value['m_fname'].' '.$value['m_lname'].'"><i class="fa fa-user"></i> Borrower Profile</a></li>
//                             </ul>
//                         </div>';

//             $data['data'][] = array(
//                 $value['m_school_id'],
//                 $value['m_fname'].' '.$value['m_lname'],
//                 $value['m_gender'],
//                 $value['m_contact'],
//                 $value['m_department'],
//                 $value['m_year_section'],
//                 $value['m_type'],
//                 $button,
//                 $value['m_fname'],
//                 $value['m_lname'],
//                 $value['id']
//             );
//         }
//         echo json_encode($data);
//     } else {
//         $data['data'] = array();
//         echo json_encode($data);
//     }
// }


        public function display_user()
        {
            global $conn; 
            $sql = $conn->prepare("SELECT * FROM user");
            $sql->execute();
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                foreach ($fetch as $key => $value) {
                    $status = ($value['status'] == 1) ? '<a href="javascript:;" class="deactivate-user" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-user" ><i class="fa fa-remove"></i> activate</a>' ;
                    $button =   '<div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:;" class="edit-user" ><i class="fa fa-edit"></i> Edit</a></li>
                                        <li>'.$status.'</li>
                                        <li><a href="javascript:;" class="edit-upass" ><i class="fa fa-lock"></i> Change Password</a></li>
                                    </ul>
                                </div>';
                    $type = ($value['type'] == 1) ? 'Administrator' : 'Staff/ LabTechnician';
                    $data['data'][] = array($value['name'],$type,$value['username'],$button,$value['id'],$value['password']);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }
        }


        public function display_roomtype()
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM room WHERE rm_name = ?');
            $sql->execute(array('room 310'));
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                
                foreach ($fetch as $key => $value) {
                    $data[] = array($value['id'],ucwords($value['rm_name']));
                }
                echo json_encode($data);

            }else{
                echo "0";
            }
        }

        public function display_roomtype1($id)
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM room WHERE rm_status = ? AND id != ? ORDER BY rm_name ASC');
            $sql->execute(array(1,$id));
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                
                foreach ($fetch as $key => $value) {
                    $data[] = array($value['id'],ucwords($value['rm_name']));
                }
                echo json_encode($data);

            }else{
                echo "0";
            }
        }

public function display_equipment()
{
    global $conn;

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'tools')); // Change 'Tools' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDate = $dateAdded->format('F d, Y');
            $button =  '<div class="btn-group">
                                <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
            $data['data'][] = array(
                '<img src="' . $photo . '" style="height:75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                $value['i_description'],
                '<td>' . $value['i_description'] . '</td>', // Encapsulate description within <td> tags
                $value['item_rawstock'],
                $value['items_stock'],
                $formattedDate,
                $button,
                $value['i_brand']
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}



        public function display_roominfo($id,$name)
        {
            global $conn;

            // $sql = $conn->prepare(' SELECT * FROM equipment
            //                      -- LEFT JOIN room_equipment ON room_equipment.equipment_id = equipment.id
            //                      WHERE room_id = ?');

            if($name == 'room 310'){

                $sql = $conn->prepare('SELECT *, item_stock.id as itemID FROM item_stock 
                                        LEFT JOIN item ON item.id = item_stock.item_id
                                        LEFT JOIN room ON room.id = item_stock.room_id 
                                        WHERE item_stock.room_id = ? AND item_stock.items_stock != ?');
                $sql->execute(array($id,0));
                $count = $sql->rowCount();
                $fetch = $sql->fetchAll();
                    if($count > 0){
                        
                        foreach ($fetch as $key => $value) {


                            $button =   '<div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:;" class="transfer" data-id="'.$value['itemID'].'"><i class="fa fa-forward"></i> Transfer</a></li>
                                            </ul>
                                        </div>';

                            $item_status = ($value['item_status'] == 1) ? 'New' : 'Old';

                        
                            $data['data'][] = array($value['i_model'],ucwords($value['i_category']),ucwords($value['i_brand']),$value['i_description'],$value['items_stock'],ucwords($value['i_type']),$item_status,$button);
                        }
                        echo json_encode($data);

                    }else{
                        $data['data'] = array();
                        echo json_encode($data);
                    }
            }else{
                $sql = $conn->prepare('SELECT *, item_transfer.id as itemID FROM item_transfer
                                        LEFT JOIN item_stock ON item_stock.id = item_transfer.t_stockID
                                        LEFT JOIN item ON item.id = item_stock.item_id
                                        WHERE item_transfer.t_roomID = ? AND item_transfer.t_status = ?');
                $sql->execute(array($id,1));
                $row = $sql->rowCount();
                $fetch = $sql->fetchAll();
                    if($row > 0){
                        foreach ($fetch as $key => $value) {
                            $button = "<button class='btn btn-primary btn_return' data-id=".$value['itemID'].">Return to 310</button>";
                            $data['data'][] = array($value['i_model'],ucwords($value['i_category']),ucwords($value['i_brand']),$value['i_description'],$value['t_quantity'],ucwords($value['i_type']),'Transferred',$button);
                        }
                        echo json_encode($data);
                    }else{
                        $data['data'] = array();
                        echo json_encode($data);
                    }
            }
        }


        public function display_newtransaction()
        {
            global $conn;

            $sql = $conn->prepare("SELECT * FROM equipment
                                    LEFT JOIN room ON room.id = equipment.room_id
                                    WHERE equipment.e_stockleft != ?");
            $sql->execute(array(0));
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();

            if($count > 0){
                foreach ($fetch as $key => $value) {
                    $input = "<div class='form-group'><input type='checkbox' value='".$value['id']."' name='items[]'></div>";
                    $data['data'][] = array($input, $value['e_deviceid'],$value['e_deviceid'],ucwords($value['e_category']),ucwords($value['e_brand']),ucwords($value['rm_name']),$value['e_stockleft']);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }

        }


        public function display_memberselect()
        {
            global $conn;

            $sql = $conn->prepare("SELECT * FROM member WHERE m_status = ? ORDER BY m_fname ASC");
            $sql->execute(array(1));
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                foreach ($fetch as $key => $value) {
                    $data[] = array($value['m_fname'].' '.$value['m_lname'],$value['m_school_id'],$value['id']);    
                }
                echo json_encode($data);
            }else{
                echo "0";
            }
        }


        public function display_equipmentinfo($id)
        {
            global $conn;

            $sql = $conn->prepare("SELECT * FROM item_stock 
                                   LEFT JOIN item ON item.id = item_stock.item_id
                                   WHERE item_stock.id = ?");
            $sql->execute(array($id));
            $fetch = $sql->fetchAll();
            $count = $sql->rowCount();
            if($count > 0){
                foreach ($fetch as $key => $value) {

                    $item_stat = ($value['item_status'] == 1 ) ? 'New' : 'Old';
                    $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                    
                    $data[] = array('e_photo'=>$photo,
                                    'e_deviceid'=>$value['i_deviceID'],
                                    'e_category'=>ucwords($value['i_category']),
                                    'e_brand'=>ucwords($value['i_brand']),
                                    'e_description'=>$value['i_description'],
                                    'e_stock'=>$value['item_rawstock'],
                                    'e_stockleft'=>$value['items_stock'],
                                    'e_type'=>ucwords($value['i_type']),
                                    'e_status'=>$item_stat,
                                    'e_model'=>ucwords($value['i_model']),
                                    'e_mr'=>ucwords($value['i_mr']),
                                    'e_price'=>ucwords($value['i_price'])
                                    );
                }
                echo json_encode($data);
            }
        }

        public function display_equipment_new() //ito yung sa new transaction
{
    global $conn;
    
    // Prepare SQL query without LIMIT since we want all items
    $sql = $conn->prepare('SELECT *, item_stock.id as re_id, item.id as itemid FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item_stock.items_stock > ? ORDER BY item_status ASC');
    
    $sql->execute(array(0));
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {
        $data = array(); // Initialize an empty array to store data

        foreach ($fetch as $key => $value) {
            // Determine item status
            $itemstatus = ($value['item_status'] == 1) ? 'New' : 'Old';

            // Check if the item is a chemical and not expired
            $isChemical = (strtolower($value['i_category']) === 'chemicals');
            $expirationDate = new DateTime($value['i_date_expiration']);
            $today = new DateTime();
            $notExpiredChemical = $isChemical && ($expirationDate > $today);

            // If the item is not a chemical or is a chemical but not expired, add to the data array
            if (!$isChemical || $notExpiredChemical) {
                $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data[] = array(
                    'id' => $value['itemid'] . "||" . $value['re_id'],
                    'deviceid' => $value['i_model'],
                    'category' => ucwords($value['i_description']),
                    'brand' => ucwords($value['i_category']), // Fixed to use i_brand instead of i_photo
                    'stockleft' => $value['items_stock'],
                    'status' => $value['i_liter'],
                );
            }
        }

        // Encode the data array as JSON and echo it
        echo json_encode($data);
    } else {
        // If no rows are returned, echo 0
        echo 0;
    }
}



        

    public function display_equipment_old()
{
    global $conn;

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'Chemicals')); // Change 'Chemicals' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {
        $data['data'] = array();

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDateAdded = $dateAdded->format('F d, Y');

            $dateExpiration = new DateTime($value['i_date_expiration']);
            $formattedExpirationDate = $dateExpiration->format('F d, Y');

            $today = new DateTime();

            // Only include chemicals that are about to expire (within 5 days) and are not already expired
            $expirationTimestamp = $dateExpiration->getTimestamp();
            $todayTimestamp = $today->getTimestamp();
            $daysUntilExpiration = round(($expirationTimestamp - $todayTimestamp) / (60 * 60 * 24));

            $button = '<div class="btn-group">
                            <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];

            $rowData = array(
                '<img src="' . $photo . '" style="height=75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                $value['i_description'],
                $value['item_rawstock'],
                $formattedExpirationDate,
                $button
            );

            // Add data only if within the expiration range
            if ($daysUntilExpiration >= 0 && $daysUntilExpiration <= 5) {
                $data['data'][] = $rowData;
            }
        }

        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}



public function display_equipment_notiff() //expring chemicals
{
   global $conn;

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'Chemicals')); // Change 'Chemicals' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {
        $data['data'] = array();

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDateAdded = $dateAdded->format('F d, Y');

            $dateExpiration = new DateTime($value['i_date_expiration']);
            $formattedExpirationDate = $dateExpiration->format('F d, Y');

            $today = new DateTime();

            // Only include chemicals that are about to expire (within 5 days) and are not already expired
            $expirationTimestamp = $dateExpiration->getTimestamp();
            $todayTimestamp = $today->getTimestamp();
            $daysUntilExpiration = round(($expirationTimestamp - $todayTimestamp) / (60 * 60 * 24));

            $button = '<div class="btn-group">
                            <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];

            $rowData = array(
                '<img src="' . $photo . '" style="height=75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                $value['i_description'],
                $value['item_rawstock'],
                $formattedExpirationDate
                
            );

            // Add data only if within the expiration range
            if ($daysUntilExpiration >= 0 && $daysUntilExpiration <= 5) {
                $data['data'][] = $rowData;
            }
        }

        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}






        public function display_equipment_lost()
{
    global $conn;

    $sql = $conn->prepare('SELECT * FROM item_inventory
                            LEFT JOIN item ON item.id = item_inventory.item_id 
                            WHERE item_inventory.inventory_status = ?');
    $sql->execute(array(3));
    $count = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $data['data'][] = array(
                $value['i_model'],
                $value['i_category'],
                $value['i_brand'],
                $value['inventory_itemstock'],
                $value['item_remarks'],
                $value['item_remarks']
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


        public function display_equipment_damaged()
{
    global $conn;

    $sql = $conn->prepare('SELECT * FROM item_inventory
                            LEFT JOIN item ON item.id = item_inventory.item_id 
                            WHERE item_inventory.inventory_status = ?');
    $sql->execute(array(4));
    $count = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $data['data'][] = array(
                $value['i_model'],
                $value['i_category'],
                $value['i_brand'],
                $value['inventory_itemstock'],
                $value['item_remarks']
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


        public function display_equipment_pulled()//glassware category
{
  global $conn;

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'glassware')); // Change 'Tools' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDate = $dateAdded->format('F d, Y');
            $button =  '<div class="btn-group">
                                <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
            $data['data'][] = array(
                '<img src="' . $photo . '" style="height:75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                 $value['i_brand'],
                 $value['i_description'],
                $value['item_rawstock'],
                $value['items_stock'],
                $formattedDate,
                $button,
                $button
               
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


   public function display_equipment_equip()//equipment category
{
  global $conn;

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'equipment')); // Change 'Tools' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDate = $dateAdded->format('F d, Y');
            $button =  '<div class="btn-group">
                                <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
            $data['data'][] = array(
                '<img src="' . $photo . '" style="height:75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                 $value['i_brand'],
                 $value['i_description'],
                $value['item_rawstock'],
                $value['items_stock'],
                $formattedDate,
                $button,
                $button
               
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


        public function display_equipment_all()
        {
            global $conn;

    // Prepare SQL query with category filter for 'tools'
    $sql = $conn->prepare('SELECT *, item_stock.id as re_id, item.id as itemid FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item_stock.items_stock > ? AND item.i_category = ? 
                            GROUP BY i_model, i_brand ORDER BY item_status ASC LIMIT 50');
    
    // Execute SQL query with parameters (minimum stock level and category 'tools')
    $sql->execute(array(0, 'chemicals'));
    
    // Get the number of rows returned by the query
    $row = $sql->rowCount();
    
    // Fetch all the rows as an associative array
    $fetch = $sql->fetchAll();

    // Check if there are rows returned
    if ($row > 0) {
        $data = array(); // Initialize an empty array to store data

        // Iterate through the fetched rows
        foreach ($fetch as $key => $value) {
            // Determine item status
            $itemstatus = ($value['item_status'] == 1) ? 'New' : 'Old';

            // Check if the item is a chemical and not expired
            $isChemical = (strtolower($value['i_category']) === 'chemicals');
            $expirationDate = new DateTime($value['i_date_expiration']);
            $today = new DateTime();
            $notExpiredChemical = $isChemical && ($expirationDate > $today);

            // If the item is not a chemical or is a chemical but not expired, add to the data array
            if (!$isChemical || $notExpiredChemical) {
                $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data[] = array(
                    'id' => $value['itemid'] . "||" . $value['re_id'],
                    'deviceid' => $value['i_model'],
                    'category' => ucwords($value['i_description']),
                    'brand' => ucwords($value['i_grams']),
                    'stockleft' => $value['items_stock'],
                    'status' => $value['i_liter'],
                );
            }
        }

        // Encode the data array as JSON and echo it
        echo json_encode($data);
    } else {
        // If no rows are returned, echo 0
        echo 0;
    }
}


         
public function display_item_borrow()
{
   global $conn;

    // Prepare SQL query with category filter for 'tools'
    $sql = $conn->prepare('SELECT *, item_stock.id as re_id, item.id as itemid FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item_stock.items_stock > ? AND item.i_category = ? 
                            GROUP BY i_model, i_brand ORDER BY item_status ASC LIMIT 50');
    
    // Execute SQL query with parameters (minimum stock level and category 'tools')
    $sql->execute(array(0, 'tools'));
    
    // Get the number of rows returned by the query
    $row = $sql->rowCount();
    
    // Fetch all the rows as an associative array
    $fetch = $sql->fetchAll();

    // Check if there are rows returned
    if ($row > 0) {
        $data = array(); // Initialize an empty array to store data

        // Iterate through the fetched rows
        foreach ($fetch as $key => $value) {
            // Determine item status
            $itemstatus = ($value['item_status'] == 1) ? 'New' : 'Old';

            // Check if the item is a chemical and not expired
            $isChemical = (strtolower($value['i_category']) === 'chemicals');
            $expirationDate = new DateTime($value['i_date_expiration']);
            $today = new DateTime();
            $notExpiredChemical = $isChemical && ($expirationDate > $today);

            // If the item is not a chemical or is a chemical but not expired, add to the data array
            if (!$isChemical || $notExpiredChemical) {
                $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data[] = array(
                    'id' => $value['itemid'] . "||" . $value['re_id'],
                    'deviceid' => $value['i_description'],
                    'category' => ucwords($value['i_model']),
                    'brand' => ucwords($value['i_category']),
                    'stockleft' => $value['items_stock'],
                    'status' => $itemstatus,
                );
            }
        }

        // Encode the data array as JSON and echo it
        echo json_encode($data);
    } else {
        // If no rows are returned, echo 0
        echo 0;
    }
}


public function display_item_borrow2()
{
   global $conn;

    // Prepare SQL query with category filter for 'tools'
    $sql = $conn->prepare('SELECT *, item_stock.id as re_id, item.id as itemid FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item_stock.items_stock > ? AND item.i_category = ? 
                            GROUP BY i_model, i_brand ORDER BY item_status ASC LIMIT 50');
    
    // Execute SQL query with parameters (minimum stock level and category 'tools')
    $sql->execute(array(0, 'glassware'));
    
    // Get the number of rows returned by the query
    $row = $sql->rowCount();
    
    // Fetch all the rows as an associative array
    $fetch = $sql->fetchAll();

    // Check if there are rows returned
    if ($row > 0) {
        $data = array(); // Initialize an empty array to store data

        // Iterate through the fetched rows
        foreach ($fetch as $key => $value) {
            // Determine item status
            $itemstatus = ($value['item_status'] == 1) ? 'New' : 'Old';

            // Check if the item is a chemical and not expired
            $isChemical = (strtolower($value['i_category']) === 'chemicals');
            $expirationDate = new DateTime($value['i_date_expiration']);
            $today = new DateTime();
            $notExpiredChemical = $isChemical && ($expirationDate > $today);

            // If the item is not a chemical or is a chemical but not expired, add to the data array
            if (!$isChemical || $notExpiredChemical) {
                $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data[] = array(
                    'id' => $value['itemid'] . "||" . $value['re_id'],
                    'deviceid' => $value['i_description'],
                    'category' => ucwords($value['i_model']),
                    'brand' => ucwords($value['i_category']),
                    'stockleft' => $value['items_stock'],
                    'status' => $value['i_liter'],
                );
            }
        }

        // Encode the data array as JSON and echo it
        echo json_encode($data);
    } else {
        // If no rows are returned, echo 0
        echo 0;
    }
}

public function display_item_borrow3()
{
    global $conn;

    // Prepare SQL query with category filter for 'tools'
    $sql = $conn->prepare('SELECT *, item_stock.id as re_id, item.id as itemid FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item_stock.items_stock > ? AND item.i_category = ? 
                            GROUP BY i_model, i_brand ORDER BY item_status ASC LIMIT 50');
    
    // Execute SQL query with parameters (minimum stock level and category 'tools')
    $sql->execute(array(0, 'equipment'));
    
    // Get the number of rows returned by the query
    $row = $sql->rowCount();
    
    // Fetch all the rows as an associative array
    $fetch = $sql->fetchAll();

    // Check if there are rows returned
    if ($row > 0) {
        $data = array(); // Initialize an empty array to store data

        // Iterate through the fetched rows
        foreach ($fetch as $key => $value) {
            // Determine item status
            $itemstatus = ($value['item_status'] == 1) ? 'New' : 'Old';

            // Check if the item is a chemical and not expired
            $isChemical = (strtolower($value['i_category']) === 'chemicals');
            $expirationDate = new DateTime($value['i_date_expiration']);
            $today = new DateTime();
            $notExpiredChemical = $isChemical && ($expirationDate > $today);

            // If the item is not a chemical or is a chemical but not expired, add to the data array
            if (!$isChemical || $notExpiredChemical) {
                $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data[] = array(
                    'id' => $value['itemid'] . "||" . $value['re_id'],
                    'deviceid' => $value['i_description'],
                    'category' => ucwords($value['i_model']),
                    'brand' => ucwords($value['i_category']),
                    'stockleft' => $value['items_stock'],
                    'status' => $itemstatus,
                );
            }
        }

        // Encode the data array as JSON and echo it
        echo json_encode($data);
    } else {
        // If no rows are returned, echo 0
        echo 0;
    }
}


     public function display_borrow()
{
    global $conn; 
    $sql = $conn->prepare('SELECT *, GROUP_CONCAT(item.i_deviceID, " - ", item.i_model, "<br/>") item_borrow FROM borrow
                        LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                        LEFT JOIN item ON item.id = item_stock.item_id
                        LEFT JOIN member ON member.id = borrow.member_id
                        LEFT JOIN room ON room.id = borrow.room_assigned
                        WHERE borrow.status = ? GROUP BY borrow.borrowcode
                        ORDER BY date_borrow DESC'); // Replace 'your_column_name' with the actual column you want to use for sorting

    $sql->execute(array(1));
    $fetch = $sql->fetchAll();
    $count = $sql->rowCount();
    
    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $modalId = 'myModal2_' . $key; // Unique modal ID for each item

            $button = "<a href='#$modalId' class='btn btn-primary' data-toggle='modal'>
                          Returned
                      </a>

                      <!-- Modal HTML -->
                      <div id='$modalId' class='modal fade'>
                          <div class='modal-dialog modal-confirm'>
                              <div class='modal-content'>
                                  <div class='modal-header'>            
                                      <h4 class='modal-title'>Confirmation</h4>    
                                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                  </div>
                                  <div class='modal-body'>
                                      <p>Are you sure you want to return?</p>
                                  </div>
                                  <div class='modal-footer'>
                                      <a href='#' class='btn btn-danger' data-dismiss='modal'>Cancel</a>
                                      <button class='btn btn-primary confirmYesButton' data-id='".$value['member_id']."/".$value['borrowcode']."' style='background-color: #yourColor; color: #fff;'>Yes</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <script language='javascript'>
                          // Listen for the 'Yes' button click
                          $('#$modalId').on('click', '.confirmYesButton', function() {
                              // Add a delay of 2 seconds before reloading
                              setTimeout(function() {
                                  window.location.reload(1);
                              }, 1000);
                          });
                      </script>";

            $date = date('F d,Y H:i:s A', strtotime($value['date_borrow']));
            $data['data'][] = array($value['m_fname'].' '.$value['m_lname'],$date,$value['item_borrow'],$button,ucwords($value['rm_name']));
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


        public function display_return()
        {
            global $conn; 
            if(isset($_POST['month']) && isset($_POST['year']) && $_POST['month'] != "" && $_POST['year'] != "")
            {
                $sql = $conn->prepare("SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_model,  '<br/>') item_borrow FROM borrow
                                    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = borrow.member_id
                                    WHERE MONTH(borrow.date_borrow) = ".$_POST['month']." AND  YEAR(borrow.date_borrow) = ".$_POST['year']."
                                    GROUP BY borrow.borrowcode");
            }
            else if(isset($_POST['month']) && $_POST['month'] != "")
            {
                $sql = $conn->prepare("SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_model,  '<br/>') item_borrow FROM borrow
                                    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = borrow.member_id
                                    WHERE MONTH(borrow.date_borrow) = ".$_POST['month']." GROUP BY borrow.borrowcode");
            }
            else if(isset($_POST['year']) && $_POST['year'] != "")
            {
                $sql = $conn->prepare("SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_model,  '<br/>') item_borrow FROM borrow
                                    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = borrow.member_id
                                    WHERE YEAR(borrow.date_borrow) = ".$_POST['year']."
                                    GROUP BY borrow.borrowcode");
            }
            else
            {
                $sql = $conn->prepare(' SELECT *, GROUP_CONCAT(item.i_deviceID, " - " ,item.i_model,  "<br/>") item_borrow FROM borrow
                                    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = borrow.member_id
                                    GROUP BY borrow.borrowcode');
            }

            $sql->execute();
            $fetch = $sql->fetchAll();
            $count = $sql->rowCount();
            if($count > 0){
                foreach ($fetch as $key => $value) {
                // $button = "<button class='btn btn-primary' data-id='".$value['member_id']."'>
                //          Return
                //          <i class='fa fa-chevron-right'></i>
                //          </button>";
                $date = ($value['date_return'] == 'NULL' || $value['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($value['date_return']));
                $date2 = date('F d,Y H:i:s A', strtotime($value['date_borrow']));
                    $data['data'][] = array($value['m_fname'].' '.$value['m_lname'],$value['item_borrow'],$date,$date2);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }
        }
        
          public function pending_reservation()
        {
            global $conn; 
            $sql = $conn->prepare(' SELECT *, GROUP_CONCAT(item.i_deviceID, " - " ,item.i_model,  "<br/>") item_borrow FROM reservation
                                    LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = reservation.member_id
                                    LEFT JOIN room ON room.id = reservation.assign_room
                                    WHERE reservation.status = ? GROUP BY reservation.reservation_code ORDER BY reservation.reserve_date ASC');
            $sql->execute(array(0));
            $fetch = $sql->fetchAll();
            $count = $sql->rowCount();
            if($count > 0){
                foreach ($fetch as $key => $value) {
               $button = "<button class='btn btn-primary trigger-btn' data-toggle='modal' data-target='#myModal1'>
              Accept
              <i class='fa fa-chevron-right'></i>
            </button>
            <button class='btn btn-primary trigger-btn' data-toggle='modal' data-target='#myModalCancel'>
              Cancel
              <i class='fa fa-remove'></i>
            </button>

<!-- Confirmation Modal -->
<div id='myModal1' class='modal fade'>
  <div class='modal-dialog modal-confirm'>
    <div class='modal-content'>
      <div class='modal-header'>            
        <h4 class='modal-title'>Confirmation</h4>    
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Are you sure you want to Accept this?</p>
      </div>
      <div class='modal-footer'>
        <button class='btn btn-danger' data-dismiss='modal'>Cancel</button>
        <button class='btn btn-primary btn-accept' data-id='".$value['reservation_code']."'>Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Cancel Modal -->
<div id='myModalCancel' class='modal fade'>
  <div class='modal-dialog modal-confirm'>
    <div class='modal-content'>
      <div class='modal-header'>            
        <h4 class='modal-title'>Cancellation</h4>    
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Are you sure you want to cancel?</p>
      </div>
      <div class='modal-footer'>
        <button class='btn btn-danger' data-dismiss='modal'>No</button>
        <button class='btn btn-danger btn-cancel' data-id='".$value['reservation_code']."'>Yes</button>
      </div>
    </div>
  </div>
</div>

<script language='javascript'>
// Listen for the 'Yes' button click
$('#myModal1').on('click', '.btn-accept', function() {
    // Add a delay of 2 seconds before reloading
    setTimeout(function() {
        window.location.reload(1);
    }, 2000);
});
</script>";

        $date = date('F d,Y H:i:s A', strtotime($value['reserve_date'].' '.$value['reservation_time']));
                    $data['data'][] = array($value['m_fname'].' '.$value['m_lname'],$value['item_borrow'],$date,ucwords($value['rm_name']),$button);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }
        }
   public function accept_reservation()
{
    global $conn; 
    $sql = $conn->prepare('SELECT *, GROUP_CONCAT(item.i_deviceID, " - ", item.i_model, "<br/>") item_borrow FROM reservation
                            LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
                            LEFT JOIN item ON item.id = item_stock.item_id
                            LEFT JOIN member ON member.id = reservation.member_id
                            LEFT JOIN room ON room.id = reservation.assign_room
                            WHERE reservation.status = ? GROUP BY reservation.reservation_code DESC');
    $sql->execute(array(1));
    $fetch = $sql->fetchAll();
    $count = $sql->rowCount();
    if ($count > 0) {
        foreach ($fetch as $key => $value) {
            $button = "<button class='btn btn-primary trigger-btn' data-toggle='modal' data-target='#myModal3'>
                            Borrow
                            <i class='fa fa-chevron-right'></i>
                        </button>
                        
                        <!-- Modal HTML -->
                        <div id='myModal3' class='modal fade'>
                            <div class='modal-dialog modal-confirm'>
                                <div class='modal-content'>
                                    <div class='modal-header'>            
                                        <h4 class='modal-title'>Confirmation</h4>    
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Are you sure you want to Borrow?</p>
                                    </div>
                                    <div class='modal-footer'>
                                        <a href='#' class='btn btn-danger' data-dismiss='modal'>Cancel</a>
                                        <button class='btn btn-primary borrowreserve' id='confirmYesButton' data-id='".$value['reservation_code']."' style='background-color: #yourColor; color: #fff;'>Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script language='javascript'>
                            // Unbind previous click event before binding a new one
                            $('#myModal3').off('click', '.borrowreserve').on('click', '.borrowreserve', function() {
                                // Add a delay of 2 seconds before reloading
                                setTimeout(function() {
                                    window.location.reload(1);
                                }, 2000);
                            });
                        </script>";

            $date = date('F d,Y H:i:s A', strtotime($value['reserve_date'].' '.$value['reservation_time']));
            $data['data'][] = array($value['m_fname'].' '.$value['m_lname'], $value['item_borrow'], $date, ucwords($value['rm_name']), $button);
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


        public function tbluser_reservation()
{
    global $conn;
    session_start();
    $session = $_SESSION['member_id'];
    $sql = $conn->prepare('SELECT *,reservation.status as stat, GROUP_CONCAT(item.i_deviceID, " - ",item.i_model, "<br/>") item_borrow FROM reservation
                            LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
                            LEFT JOIN item ON item.id = item_stock.item_id
                            LEFT JOIN member ON member.id = reservation.member_id
                            LEFT JOIN room ON room.id = reservation.assign_room
                            LEFT JOIN reservation_status ON reservation_status.reservation_code = reservation.reservation_code
                            WHERE reservation.member_id = ? GROUP BY reservation.reservation_code');
    $sql->execute(array($session));
    $fetch = $sql->fetchAll();
    $count = $sql->rowCount();
    if ($count > 0) {
        foreach ($fetch as $key => $value) {

            if ($value['stat'] == 0) {
                $status = '<span class="badge bg-warning">Pending</span>';
            } else if ($value['stat'] == 1) {
                $status = '<span class="badge bg-success">Accepted</span>';
            } else if ($value['stat'] == 2) {
                $status = '<span class="badge bg-danger">Cancelled</span>';
            } else {
                $status = '<span class="badge bg-info">Borrowed</span>';
            }

            $date = date('F d,Y H:i:s A', strtotime($value['reserve_date'] . ' ' . $value['reservation_time']));
            $data['data'][] = array($date, $value['item_borrow'], ucwords($value['rm_name']), $value['remark'], $status);
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}


    public function chart_borrow()
{
    global $conn;

    // Assuming your PHP script is something like this
    $key = isset($_POST['key']) ? $_POST['key'] : '';

    if ($key == 'chart_borrow') {
        // Additional parameters for month and year
        $month = isset($_POST['month']) ? $_POST['month'] : date('n'); // Default to current month
        $year = isset($_POST['year']) ? $_POST['year'] : date('Y'); // Default to current year

        // Modify your SQL query to filter by month and year
        $sql = $conn->prepare('SELECT date_borrow AS date, COUNT(*) AS value 
                              FROM borrow 
                              WHERE MONTH(date_borrow) = ? AND YEAR(date_borrow) = ?
                              GROUP BY date_borrow');
        $sql->execute(array($month, $year));
        $get = $sql->fetchAll();
        $count = $sql->rowCount();

        if ($count > 0) {
            $val = array();
            foreach ($get as $key => $value) {
                $date = date('Y-m-d', strtotime($value['date']));
                $val[] = array('date' => $date, 'value' => $value['value']);
            }
            echo json_encode($val);
        } else {
            $val[] = array();
            echo json_encode($val);
        }
    }
}

        public function chart_return()
        {
            global $conn;

            $sql = $conn->prepare('SELECT *, COUNT(date_borrow) as numberborrow FROM borrow WHERE status = ? GROUP BY CAST(date_borrow AS DATE) ');
            $sql->execute(array(2));
            $get = $sql->fetchAll();
            $count = $sql->rowCount();

            if($count > 0){

                foreach ($get as $key => $value) {
                    $date = date('Y-m-d', strtotime($value['date_borrow']));
                    $val[] = array('date'=>$date,'value'=>$value['numberborrow']);
                }
                echo json_encode($val);

            }else{
                $val[] = array();
                echo json_encode($val);
            }

        }


        public function chart_combined()
{
    global $conn;

    $key = isset($_POST['key']) ? $_POST['key'] : '';

    if ($key == 'chart_combined') {
        // Borrowed items query
        $sql_borrow = $conn->prepare('SELECT date_borrow AS date, COUNT(*) AS borrowed_count 
                                      FROM borrow 
                                      WHERE YEAR(date_borrow) >= 2023
                                      GROUP BY date_borrow');
        $sql_borrow->execute();
        $borrow_data = $sql_borrow->fetchAll();

        // Returned items query
        $sql_return = $conn->prepare('SELECT date_borrow AS date, COUNT(date_borrow) AS returned_count 
                                      FROM borrow 
                                      WHERE status = ? 
                                        AND YEAR(date_borrow) >= 2023
                                      GROUP BY date_borrow');
        $sql_return->execute(array(2));
        $return_data = $sql_return->fetchAll();

        // Combine the data
        $combined_data = array();
        foreach ($borrow_data as $borrow_item) {
            $date = date('Y-m-d', strtotime($borrow_item['date']));
            $borrowed_count = $borrow_item['borrowed_count'];

            $returned_count = 0;
            foreach ($return_data as $return_item) {
                if ($return_item['date'] == $borrow_item['date']) {
                    $returned_count = $return_item['returned_count'];
                    break;
                }
            }

            $combined_data[] = array('date' => $date, 'borrowed_count' => $borrowed_count, 'returned_count' => $returned_count);
        }

        echo json_encode($combined_data);
    }
}


public function chart_inventory_tools()
{
    global $conn;

    $category = 'tools'; // Specify the category you want to display

    $sql = $conn->prepare('SELECT i_model, 
                                  item_rawstock - COALESCE(SUM(item_inventory.inventory_itemstock), 0) AS quantity_left
                           FROM item
                           LEFT JOIN item_inventory ON item.id = item_inventory.item_id
                           WHERE i_category = ?
                           GROUP BY item.id');
    $sql->execute(array($category));
    $get = $sql->fetchAll();
    $count = $sql->rowCount();

    if ($count > 0) {
        foreach ($get as $key => $value) {
            $val[] = array('country' => $value['i_model'], 'litres' => $value['quantity_left']);
        }
        echo json_encode($val);
    } else {
        $val[] = array();
        echo json_encode($val);
    }
}





public function chart_most_borrowed()
{
    global $conn;

    $sql = $conn->prepare('SELECT dates.date_transaction, dates.item_id, i.i_model, 
                                 COALESCE(borrow_counts.numberborrow, 0) + COALESCE(reserve_counts.numberreserve, 0) as total_count
                            FROM (
                                SELECT date_borrow as date_transaction, item_id FROM borrow
                                UNION ALL
                                SELECT reserve_date as date_transaction, item_id FROM reservation
                            ) dates
                            JOIN item i ON dates.item_id = i.id
                            LEFT JOIN (
                                SELECT date_borrow, item_id, COUNT(item_id) as numberborrow
                                FROM borrow
                                GROUP BY date_borrow, item_id
                            ) borrow_counts ON dates.date_transaction = borrow_counts.date_borrow AND dates.item_id = borrow_counts.item_id
                            LEFT JOIN (
                                SELECT reserve_date, item_id, COUNT(item_id) as numberreserve
                                FROM reservation
                                GROUP BY reserve_date, item_id
                            ) reserve_counts ON dates.date_transaction = reserve_counts.reserve_date AND dates.item_id = reserve_counts.item_id');
    $sql->execute();
    $get = $sql->fetchAll();
    $count = $sql->rowCount();

    if ($count > 0) {
        $result = array();

        foreach ($get as $key => $value) {
            $date = date('Y-m-d', strtotime($value['date_transaction']));
            $item_id = $value['item_id'];
            $i_model = $value['i_model'];
            $total_count = $value['total_count'];

            // Add each item individually to the result array
            $result[] = array('date' => $date, 'item_id' => $item_id, 'i_model' => $i_model, 'value' => $total_count);
        }

        echo json_encode($result);
    } else {
        $val[] = array();
        echo json_encode($val);
    }
}





public function chart_inventory_chemical()
{
    global $conn;

    $category = 'chemicals'; // Specify the category you want to display

    $sql = $conn->prepare('SELECT item.i_model, 
                                  GREATEST(0, COALESCE(item_stock.items_stock - COALESCE(SUM(item_inventory.inventory_itemstock), 0), item_stock.items_stock)) AS quantity_left
                           FROM item
                           LEFT JOIN item_stock ON item.id = item_stock.item_id
                           LEFT JOIN item_inventory ON item.id = item_inventory.item_id
                           WHERE i_category = ? AND (i_date_expiration IS NULL OR i_date_expiration > CURRENT_DATE)
                           GROUP BY item.id, item.i_model, item_stock.items_stock
                           ORDER BY item.i_model');
    $sql->execute(array($category));
    $get = $sql->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
    $count = $sql->rowCount();

    if ($count > 0) {
        $result = array();
        foreach ($get as $key => $value) {
            $result[] = array('country' => $value['i_model'], 'litres' => $value['quantity_left']);
        }
        echo json_encode($result);
    } else {
        echo json_encode(array());
    }
}

public function chart_inventory()
{
    global $conn;

    $category = 'glassware'; // Specify the category you want to display

    $sql = $conn->prepare('SELECT MAX(item.i_model) AS i_model, 
                                  COALESCE(item_stock.items_stock - COALESCE(SUM(COALESCE(item_inventory.inventory_itemstock, 0)), 0), item_stock.items_stock) AS quantity_left
                           FROM item
                           LEFT JOIN item_stock ON item.id = item_stock.item_id
                           LEFT JOIN item_inventory ON item.id = item_inventory.item_id
                           WHERE i_category = ?
                           GROUP BY item.id, item_stock.items_stock
                           ORDER BY i_model');
    $sql->execute(array($category));
    $get = $sql->fetchAll(PDO::FETCH_ASSOC);
    $count = $sql->rowCount();

    if ($count > 0) {
        $result = array();
        foreach ($get as $key => $value) {
            $result[] = array('country' => $value['i_model'], 'litres' => $value['quantity_left']);
        }
        echo json_encode($result);
    } else {
        echo json_encode(array());
    }
}


public function chart_equipment()
{
     global $conn;

    $category = 'equipment'; // Specify the category you want to display
 $sql = $conn->prepare('SELECT MAX(item.i_model) AS i_model, 
                                  COALESCE(item_stock.items_stock - COALESCE(SUM(COALESCE(item_inventory.inventory_itemstock, 0)), 0), item_stock.items_stock) AS quantity_left
                           FROM item
                           LEFT JOIN item_stock ON item.id = item_stock.item_id
                           LEFT JOIN item_inventory ON item.id = item_inventory.item_id
                           WHERE i_category = ?
                           GROUP BY item.id, item_stock.items_stock
                           ORDER BY i_model');
    $sql->execute(array($category));
    $get = $sql->fetchAll();
    $count = $sql->rowCount();

    if ($count > 0) {
        foreach ($get as $key => $value) {
            $val[] = array('country' => $value['i_model'], 'litres' => $value['quantity_left']);
        }
        echo json_encode($val);
    } else {
        $val[] = array();
        echo json_encode($val);
    }
}


public function count_chem()
{
    global $conn;

    $category = 'Chemicals'; // Specify the category you want to count

    $sql = $conn->prepare('SELECT COUNT(item_stock.id) as total
                            FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item.i_category = ? AND item_stock.item_status != ?');
    $sql->execute(array($category, 3)); // Change 3 to the status code for expired items

    $count = $sql->rowCount();
    $fetch = $sql->fetch();

    if ($count > 0) {
        echo $fetch['total'];
    } else {
        echo "0";
    }
}

public function count_glassware()
{
    global $conn;

    $category = 'Glassware'; // Specify the category you want to count

    $sql = $conn->prepare('SELECT COUNT(item_stock.id) as total
                            FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item.i_category = ?');
    $sql->execute(array($category));

    $count = $sql->rowCount();
    $fetch = $sql->fetch();

    if ($count > 0) {
        echo $fetch['total'];
    } else {
        echo "0";
    }
}

public function count_equip()
{
    global $conn;

    $category = 'Equipment'; // Specify the category you want to count

    $sql = $conn->prepare('SELECT COUNT(item_stock.id) as total
                            FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE item.i_category = ?');
    $sql->execute(array($category));

    $count = $sql->rowCount();
    $fetch = $sql->fetch();

    if ($count > 0) {
        echo $fetch['total'];
    } else {
        echo "0";
    }
}





public function count_tools()
{
    global $conn;

    $category = 'tools'; // Specify the category you want to count

    $sql = $conn->prepare('SELECT COUNT(id) as total FROM item WHERE i_category = ?');
    $sql->execute(array($category));

    $count = $sql->rowCount();
    $fetch = $sql->fetch();

    if ($count > 0) {
        echo $fetch['total'];
    } else {
        echo "0";
    }
}

        public function count_pendingres()
        {
            global $conn;
            $sql = $conn->prepare('SELECT *, COUNT(id) as total FROM reservation WHERE status = ?');
            $sql->execute(array(0));
            $count = $sql->rowCount();
            $fetch = $sql->fetch();

            if($count > 0){
                echo $fetch['total'];
            }else{
                echo "0";
            }
        }
        public function count_acceptres()
        {
            global $conn;
            $sql = $conn->prepare('SELECT *, COUNT(id) as total FROM reservation WHERE status = ?');
            $sql->execute(array(1));
            $count = $sql->rowCount();
            $fetch = $sql->fetch();

            if($count > 0){
                echo $fetch['total'];
            }else{
                echo "0";
            }
        }
        public function count_cancelres()
        {
            global $conn;
            $sql = $conn->prepare('SELECT *, COUNT(id) as total FROM reservation WHERE status = ?');
            $sql->execute(array(2));
            $count = $sql->rowCount();
            $fetch = $sql->fetch();

            if($count > 0){
                echo $fetch['total'];
            }else{
                echo "0";
            }
        }
        public function count_client()
        {
            global $conn;
            $sql = $conn->prepare('SELECT *, COUNT(id) as total FROM member WHERE m_status = ?');
            $sql->execute(array(1));
            $count = $sql->rowCount();
            $fetch = $sql->fetch();

            if($count > 0){
                echo $fetch['total'];
            }else{
                echo "0";
            }
        }



        public function table_history()
        {
            global $conn;
            $sql = $conn->prepare("SELECT * FROM history_logs 
                                    LEFT JOIN user ON user.id = history_logs.user_id
                                    ORDER BY history_logs.date_created DESC");
            $sql->execute();
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                foreach ($fetch as $key => $value) {
                    $date = date('M d,Y H:i:s A', strtotime($value['date_created']));
                    $data['data'][] = array($value['name'],$value['description'],$date);    
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }
        }

        public function dashboard_history()
        {
            global $conn;
            $sql = $conn->prepare("SELECT * FROM history_logs 
                                    LEFT JOIN user ON user.id = history_logs.user_id
                                    ORDER BY history_logs.date_created DESC LIMIT 0,10");
            $sql->execute();
            $count = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($count > 0){
                foreach ($fetch as $key => $value) {
                    $date = date('M d,Y H:i:s', strtotime($value['date_created']));
                    $data[] = array($date.' - '.$value['name'].' - '.$value['description']);
                }
                echo json_encode($data);
            }else{
                echo "0";
            }
        }

        public function view_equipment($id)
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM room WHERE rm_name = ?');
            $sql->execute(array('room 310'));
            $fetch = $sql->fetchAll();
            foreach ($fetch as $key => $value) {
                $data[] = array(ucwords($value['rm_name']),$value['id']);
            }
            echo json_encode($data);
        }


        public function display_room_reserve()
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM room WHERE rm_name != ? ORDER BY rm_name ASC');
            $sql->execute(array('room 310'));
            $fetch = $sql->fetchAll();

            foreach ($fetch as $key => $value) {
                $data[] = array(ucwords($value['rm_name']),$value['id']);
            }
            echo json_encode($data);

        }

        public function table_dashboard()
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM item_stock
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    WHERE item_stock.items_stock > ? ');
            $sql->execute(array(0));
            $row = $sql->rowCount();
            $fetch = $sql->fetchAll();
            if($row > 0){
                foreach ($fetch as $key => $value) {
                    $status = ($value['item_status'] == 1) ? 'New' : 'Old' ;
                    $data['data'][] = array($value['i_model'],$value['i_category'],$value['i_brand'],$value['i_description'],$value['items_stock'],$status);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }

        }

        public function tbl_member_profile($id)
        {
            global $conn;

            $sql = $conn->prepare('SELECT *, borrow.status as statusb FROM borrow
                                    LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = borrow.member_id
                                    LEFT JOIN room ON room.id = borrow.room_assigned
                                    WHERE borrow.member_id = ? GROUP BY borrow.borrowcode');
            $sql->execute(array($id));
            $row = $sql->rowCount();
            $fetch = $sql->fetchAll();

            if($row > 0){
                foreach ($fetch as $key => $value) {
                    $date = date('F d,Y H:i:s A', strtotime($value['date_borrow']));
                    $status = ($value['statusb'] == 1) ? 'Borrow' : 'Returned';
                    $data['data'][] = array($date,$value['i_brand'].' - '.$value['i_category'],ucwords($value['rm_name']),$status); 
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }

        }

        public function display_rooms()
        {
            global $conn;

            $sql = $conn->prepare('SELECT * FROM room WHERE rm_name != ? ORDER BY rm_name ASC');
            $sql->execute(array('room 310'));
            $fetch = $sql->fetchAll();
                foreach ($fetch as $key => $value) {
                    $data[] = array($value['id'],ucwords($value['rm_name']));
                }
                echo json_encode($data);
        }

        public function tbluser_inbox()
        {
            global $conn;
            session_start();

            $member_id = $_SESSION['member_id'];

            $sql = $conn->prepare('SELECT * FROM reservation_status
                                    LEFT JOIN reservation ON  reservation.reservation_code = reservation_status.reservation_code
                                    WHERE reservation.member_id = ?');
            $sql->execute(array($member_id));
            $fetch = $sql->fetchAll();
            $row = $sql->rowCount();

            if($row > 0 ){
                foreach ($fetch as $key => $value) {
                    $status = ($value['res_status'] == 2) ? 'Cancelled' : 'Accepted' ;
                    $data['data'][] = array($value['reservation_code'],$status, $value['remark']);
                }
                echo json_encode($data);
            }else{
                $data['data'] = array();
                echo json_encode($data);
            }
            
        }

        public function count_reservation()
        {
            global $conn;
            $date = date('Y-m-d');

            $sql = $conn->prepare('SELECT COUNT(id) as count FROM reservation WHERE status = ?  AND r_date >= ?');
            $sql->execute(array(0,$date));
            $fetch = $sql->fetch();
            $row = $sql->rowCount();
            if($row > 0){
                echo $fetch['count'];
            }else{
                echo '0';
            }
        }

        public function count_due_borrow()
        {
            global $conn;
            $date = date('Y-m-d h:i:s');

            $sql = $conn->prepare('SELECT COUNT(*) as countDue FROM borrow WHERE time_limit < ? AND status = ?');
            $sql->execute(array($date,1));
            $fetch = $sql->fetch();
            echo $fetch['countDue'];
        }

        public function display_inventory_transfer()
{
    global $conn;

    // Retrieve data excluding expired chemicals
    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) 
                            AND item.i_category = ? AND item.i_date_expiration >= CURRENT_DATE');
    $sql->execute(array(1, 2, 'Chemicals'));
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {
        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDate = $dateAdded->format('F d, Y');

            $dateExpiration = new DateTime($value['i_date_expiration']);
            $formattedDates = $dateExpiration->format('F d, Y');

            $button = '<div class="btn-group">
                            <a href="items_info?item=' . $value['e_id'] . '&1Qke#%Rasd2#a1Qasd" class="btn btn-primary"><i class="fa fa-search"></i> More info</a>
                        </div>';

            $photo = ($value['i_photo'] == "") ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
            $data['data'][] = array(
                '<img src="' . $photo . '" style="height=75px;width:75px;object-fit:cover" class="img-responsive" />',
                $value['i_model'],
                $value['i_description'],
                $value['item_rawstock'],
                $value['items_stock'],
                $formattedDates,
                $formattedDate,
                $button,
                $value['i_brand']
            );
        }
        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}




// Function to display and dispose expired items
public function display_inventory_expired()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
        // Handle the disposal here based on the posted item_id
        $itemId = $_POST['item_id'];

        $deleteSql = $conn->prepare('DELETE FROM item_stock WHERE id = ?');
        $deleteSql->execute(array($itemId));

        // You can perform additional cleanup or logging if needed
        echo json_encode(['success' => true]);
        exit; // Make sure to exit to avoid further processing of the main display function
    }

    $sql = $conn->prepare('SELECT *, item_stock.id as e_id FROM item_stock
                            LEFT JOIN item ON item.id = item_stock.item_id
                            WHERE (item_stock.item_status = ? OR item_stock.item_status = ?) AND item.i_category = ?');
    $sql->execute(array(1, 2, 'Chemicals')); // Change 'Chemicals' to the actual category you want
    $row = $sql->rowCount();
    $fetch = $sql->fetchAll();

    if ($row > 0) {
        $data['data'] = array();

        foreach ($fetch as $key => $value) {
            $dateAdded = new DateTime($value['i_date_added']);
            $formattedDateAdded = $dateAdded->format('F d, Y');

            $dateExpiration = new DateTime($value['i_date_expiration']);
            $formattedExpirationDate = $dateExpiration->format('F d, Y');
            $remarks_exp = 'Expired;Non Reactive';

            $today = new DateTime();

            // Only include chemicals that are about to expire (within 5 days) or already expired
            $expirationTimestamp = $dateExpiration->getTimestamp();
            $todayTimestamp = $today->getTimestamp();
            $daysUntilExpiration = round(($expirationTimestamp - $todayTimestamp) / (60 * 60 * 24));

        $button = "
<button class='btn btn-primary trigger-btn' data-toggle='modal' data-target='#myModal4'>
    Disposed
    <i class='fa fa-trash'></i>
</button>

<!-- Modal HTML -->
<div id='myModal4' class='modal fade'>
    <div class='modal-dialog modal-confirm'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h4 class='modal-title'>Confirmation</h4>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
            </div>
            <div class='modal-body'>
                <p>Are you sure you want to disposed this chemical?</p>
            </div>
            <div class='modal-footer'>
                <a href='#' class='btn btn-info' data-dismiss='modal'>Cancel</a>
                <button class='btn btn-primary btn-dispose' data-item-id='{$value['e_id']}'>Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Listen for the 'Yes' button click
    $('#myModal4').on('click', '.btn-dispose', function () {
        // Add a delay of 2 seconds before reloading
        setTimeout(function () {
            // Simulate a successful delete
            // In a real scenario, this is where you would perform the actual delete operation
            // For now, let's just show an alert
            alert('Chemical disposed successfully!');
            
            // Reload the page
            window.location.reload(1);
        }, 1500);
    });
</script>";



            if ($daysUntilExpiration <= 0) {
                $photo = empty($value['i_photo']) ? "../assets/noimagefound.jpg" : "../uploads/" . $value['i_photo'];
                $data['data'][] = array(
                    '<img src="' . $photo . '" style="height=75px;width:75px;object-fit:cover" class="img-responsive" />',
                    $value['i_model'],
                    $value['i_description'],
                    $value['item_rawstock'],
                    $formattedExpirationDate,
                    $remarks_exp,
                    $button
                );
            }
        }

        echo json_encode($data);
    } else {
        $data['data'] = array();
        echo json_encode($data);
    }
}










        public function loadReservationsJSON()
        {
            global $conn; 
            $sql = $conn->prepare('SELECT *, GROUP_CONCAT(item.i_category,  "") item_borrow FROM reservation
                                    LEFT JOIN item_stock ON item_stock.id = reservation.stock_id
                                    LEFT JOIN item ON item.id = item_stock.item_id
                                    LEFT JOIN member ON member.id = reservation.member_id
                                    LEFT JOIN room ON room.id = reservation.assign_room
                                    WHERE reservation.status = ? GROUP BY reservation.reservation_code');
            $sql->execute(array(1));
            $fetch = $sql->fetchAll();
            $count = $sql->rowCount();
            $reserveArr = array();
            if($count > 0)
            {
                foreach($fetch as $reservation)
                {
                    $reserveArr[] = array(
                        "title" => $reservation['item_borrow'] . " " . ucwords($reservation['rm_name']),
                        "allDay" => false,
                        "start" => date("Y-m-d H:i:s",strtotime($reservation['reserve_date'].' '.$reservation['reservation_time'])),
                        "backgroundColor" => "#0073b7",
                        "borderColor" => "#0073b7",
                        "url" => "../views/reservation"
                    );
                }

                echo json_encode($reserveArr);

            }
            else
            {
                echo json_encode($reserveArr);
            }
        }

        public function chartFrequency()
        {
            global $conn;

            $sql = $conn->prepare('SELECT *, (SELECT COUNT(*) FROM borrow WHERE borrow.item_id = item.id AND borrow.status = ?) AS borrowCount FROM item GROUP BY i_model');
            $sql->execute(array(1));
            $get = $sql->fetchAll();
            $count = $sql->rowCount();

            if($count > 0){

                foreach ($get as $key => $value) {
                    $val[] = array('country'=>$value['i_model'],'litres'=>$value['borrowCount']);
                }
                echo json_encode($val);

            }else{
                $val[] = array();
                echo json_encode($val);
            }
        }
    }


    $display = new display();

    $key = trim($_POST['key']);

    switch ($key) {

        case 'display_room';
        $display->display_room();
        break;

        case 'display_member';
        $display->display_member();
        break;

        case 'display_user';
        $display->display_user();
        break;

        case 'display_roomtype';
        $display->display_roomtype();
        break;

        case 'display_roomtype1';
        $id = $_POST['id'];
        $display->display_roomtype1($id);
        break;

        case 'display_equipment';
        $display->display_equipment();
        break;
        $display->display_equipment_glass();
        case 'display_equipment_glass';
        break;


        case 'display_chemicals';
        $display->display_chemicals();
        break;

        case 'display_roominfo';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $display->display_roominfo($id,$name);
        break;

        case 'display_newtransaction';
        $display->display_newtransaction();
        break;
        
        case 'display_memberselect';
        $display->display_memberselect();
        break;

        case 'display_equipmentinfo';
        $id = trim($_POST['id']);
        $display->display_equipmentinfo($id);
        break;

        case 'display_equipment_new';
        $display->display_equipment_new();
        break;  

        case 'display_equipment_old';
        $display->display_equipment_old();
        break;  


        case 'display_equipment_notiff';
        $display->display_equipment_notiff();
        break;  

        case 'display_equipment_lost';
        $display->display_equipment_lost();
        break;  

        case 'display_equipment_damaged';
        $display->display_equipment_damaged();
        break;  

        case 'display_equipment_pulled';
        $display->display_equipment_pulled();
        break;  


        // case 'display_mem2';
        // $display->display_mem2();
        // break;

        // case 'display_mem3';
        // $display->display_mem3();
        // break;

        // case 'display_mem4';
        // $display->display_mem4();
        // break;

        // case 'display_mem5';
        // $display->display_mem5();
        // break;

        case 'display_equipment_all';
        $display->display_equipment_all();
        break;

        case 'display_item_borrow';
        $display->display_item_borrow();
        break;

        case 'display_borrow';
        $display->display_borrow();
        break;

        case 'display_return';
        $display->display_return();
        break;

        case 'pending_reservation';
        $display->pending_reservation();
        break;

        case 'accept_reservation';
        $display->accept_reservation();
        break;

        case 'tbluser_reservation';
        $display->tbluser_reservation();
        break;

        case 'chart_borrow';
        $display->chart_borrow();
        break;

        case 'chart_return';
        $display->chart_return();
        break;

        case 'chart_inventory_tools';
        $display->chart_inventory_tools();
        break;

        case 'chart_inventory';
        $display->chart_inventory();
        break;

        case 'chart_inventory_chemical';
        $display->chart_inventory_chemical();
        break;

        case 'chart_most_borrowed';
        $display->chart_most_borrowed();
        break;



        case 'count_tools';
        $display->count_tools();
        break;

        case 'count_chem';
        $display->count_chem();
        break;


        case 'count_pendingres':
        $display->count_pendingres();
        break;

        case 'count_acceptres':
        $display->count_acceptres();
        break;
        
        case 'cancelled_reservation':
        $display->cancelled_reservation();
        break;

        case 'count_cancelres':
        $display->count_cancelres();
        break;

        case 'count_client':
        $display->count_client();
        break;

        case 'table_history';
        $display->table_history();
        break;

        case 'dashboard_history';
        $display->dashboard_history();
        break;

        case 'view_equipment';
        $id = $_POST['id'];
        $display->view_equipment($id);
        break;

        case 'display_room_reserve';
        $display->display_room_reserve();
        break;

        case 'table_dashboard';
        $display->table_dashboard();
        break;

        case 'tbl_member_profile';
        $id = $_POST['id'];
        $display->tbl_member_profile($id);
        break;

        case 'display_rooms';
        $display->display_rooms();
        break;

        case 'chart_combined';
        $display->chart_combined();
        break;


        case 'tbluser_inbox';
        $display->tbluser_inbox();
        break;

        case 'count_reservation';
        $display->count_reservation();
        break;

        case 'display_inventory_transfer';
        $display->display_inventory_transfer();
        break;

        case 'display_inventory_expired';
        $display->display_inventory_expired();
        break;

        case 'load_reservations_json';
        $display->loadReservationsJSON();
        break;

        case 'chart_frequency';
        $display->chartFrequency();
        break;

        case 'count_due_borrow';
        $display->count_due_borrow();
        break;


        case 'count_glassware';
        $display->count_glassware();
        break;

         case 'count_equip';
        $display->count_equip();
        break;

        case 'display_item_borrow2';
        $display->display_item_borrow2();
        break;

         case 'display_item_borrow3';
        $display->display_item_borrow3();
        break;

        case 'display_equipment_equip';
        $display->display_equipment_equip();
        break;

         case 'chart_equipment';
        $display->chart_equipment();
        break;
    }




?>
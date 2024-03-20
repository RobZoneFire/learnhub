<?php
session_start();

// Include the database connection file
include('includes/database.php');

if (!isset($_SESSION['email']) || empty($_SESSION['email']) || !isset($_SESSION['type'])) 
{
    header("Location: index.php");
    exit();
}

// Logout functionality
if (isset($_POST['logout'])) 
{
    header("Location: logout.php");
}

// Check user role and redirect if not authorized
$allowed_roles = ['student'];

if (!in_array($_SESSION['type'], $allowed_roles)) 
{
    // User is not authorized for this dashboard
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <script>
      localStorage.setItem('user_data', JSON.stringify(
      {
          "success": true,
          "message": "Login successfully.",

          "user": 
          {
              "id": 1036,
              "username": "202001102",
              "first_name": "RHOB LESTER BAQUIRAN",
              "last_name": "",
              "middle_name": null,
              "date_of_birth": null,
              "employee_id": null,
              "name_extension": null,
              "email": "202001102@iacademy.edu.ph",
              "sex": "male",
              "separation_type": null,
              "is_resigned": 0,
              "group_id": 4,
              "division_head": null,

              "department": 
              {
                  "id": 19,
                  "name": "School of Computing Student",
                  "color": "#000000",
                  "dept_active_directory": null,
                  "descriptions": "For School of Computing Students",
                  "event_label": "",
                  "department_contact_email": null,

                  "head": 
                  {
                      "id": 3316,
                      "first_name": "Francisco",
                      "middle_name": null,
                      "last_name": "Napalit"
                  },

                  "head_superior_user_id": 3316,
                  "division_head_name": "Francisco Napalit",
                  "head_user_id": 3316,
                  "is_academic": 0,
                  "is_academic2": 0,
                  "is_hidden": 0,
                  "second_head_user_id": 3316,
                  "accountabilities": null,
                  "slug": null,
                  "type": "student",
                  "sub_type": "computing",
                  "clearance_group_id": null,
                  "clearance_group_name": null,
                  "campus": "makati",
                  "finance_primary_approver_id": "3316",
                  "finance_primary_approver_name": "Francisco Napalit",
                  "finance_secondary_approver_id": "3316",
                  "finance_secondary_approver_name": "Francisco Napalit"
              },

              "position": null,
              "date_employed": "January 01, 1970",
              "contact_number": null,
              "type": "student",
              "is_teaching": 1,
              "is_department_head": 0,
              "is_division_head": 0,
              "residential_address": null,
              "permanent_address": null,
              "profile_picture": "https:\/\/portalv2.iacademy.edu.ph\/storage\/user_pictures\/default.png",
              "student_type": "college",
              "course_id": 11
          },

          "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9....", // (truncated for brevity)
          "token_type": "Bearer",
          "expires_at": "2024-03-10 21:31:09"
      }));
  </script>

  <script>
      localStorage.setItem('my-sidebar', JSON.stringify([
      {
          "id": 45,
          "module": "Item Reservation",
          "name": "Item Reservation",
          "slug": "stock-room.index",
          "url": "\/item-borrowing\/my-reservation",
          "icon": "item-borrowing-solid.svg",
          "functions": ["Update Item Reservations"]
      },

      {
          "id": 140,
          "module": "Online Library",
          "name": "Online Library",
          "slug": "online.library",
          "url": "\/library-home",
          "icon": "library-solid.svg",
          "functions": []
      },

      {
          "id": 166,
          "module": "IT Support",
          "name": "IT Support",
          "slug": "it-support-list",
          "url": "\/itadmin\/support",
          "icon": "itsupp-solid.svg",
          "functions": []
      },

      {
          "id": 209,
          "module": "College Academics Student Consultation",
          "name": "College Academics Student Consultation",
          "slug": "college.academics-consultations",
          "url": "\/college\/consultation\/home",
          "icon": "college-consultation-solid.svg",
          "functions": []
      },

      {
          "id": 253,
          "module": "Room Reservation",
          "name": "Room Reservation",
          "slug": "roomreservation.index",
          "url": "\/admin-facilities\/room-reservation\/reservations",
          "icon": "room-reservationv2.svg",
          "functions": []
      }
      ]));
  </script>

  <meta name="csrf-token" content="sw6FfbyLs8IzrzOP3Q2H2wXPeXnjRUyUxxBfrTdY">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Management System</title>
  <link href="includes/appnewvampstable.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="https://portalv2.iacademy.edu.ph/images/fav_new.png" type="image/gif" sizes="16x16">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="includes/appnewvampstable.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="https://portalv2.iacademy.edu.ph/images/fav_new.png" type="image/gif" sizes="16x16">
</head>

  <body>
    <div id="app">
      <div data-v-37f647ee="" id="wrapper" class="wrapper">
        <header data-v-10f215ae="" data-v-37f647ee="" id="topnav">
          <div data-v-10f215ae="" class="topbar-main d-flex align-items-center">
            <div data-v-10f215ae="" class="container-fluid">
              <div data-v-10f215ae="" class="logo">
                <a data-v-10f215ae="" class="logo active">
                  <span data-v-10f215ae="" class="logo-small">
                    <i data-v-10f215ae="" class="mdi mdi-radar"></i>
                  </span>
                  <span data-v-10f215ae="" class="logo-large">
                    <i data-v-10f215ae="" class="mdi mdi-radar"></i>
                    <img data-v-10f215ae="" src="includes/newlogo-2020.png" height="50" alt="">
                    <small data-v-10f215ae="" class="ml-3 sms_nav font-weight-bold" style="font-size: 1.2rem;">School Management System</small>
                  </span>
                </a>
              </div>
              <div data-v-10f215ae="" class="menu-extras topbar-custom">
                <ul data-v-10f215ae="" class="list-inline float-right mb-0">
                  <li data-v-10f215ae="" class="list-inline-item dropdown notification-list">
                    <a data-v-10f215ae="" data-toggle="dropdown" href="https://portalv2.iacademy.edu.ph/callback/google?state=qGbwXtEAOJdmjOm9UXK5Kz4OUHr0qCSZ6VWdRBnn&amp;code=4%2F0AeaYSHBAcmeF8xhzyHrF6qg54CFcNQum5NcGxJxJ6jzdnQT_JzmOVIsyiqCcbOqTBMlMYQ&amp;scope=email+profile+openid+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;authuser=0&amp;hd=iacademy.edu.ph&amp;prompt=consent#"
                      role="button" aria-haspopup="false" aria-expanded="false" class="nav-link dropdown-toggle waves-effect nav-user">
                      <img data-v-10f215ae="" alt="user" class="rounded-circle ml-2" src="includes/default.png">
                    </a>
                    <div data-v-10f215ae="" aria-labelledby="Preview" class="dropdown-menu dropdown-menu-right profile-dropdown" style="width: 215px;">
                      <div data-v-10f215ae="" class="dropdown-item noti-title" style="white-space: inherit;">
                        <h5 data-v-10f215ae="" class="text-overflow">
                          <small data-v-10f215ae="" class="text-white">Welcome, RHOB LESTER BAQUIRAN </small>
                        </h5>
                      </div>
                      <a data-v-10f215ae="" class="dropdown-item notify-item"><i data-v-10f215ae="" class="mdi mdi-account"></i> <span data-v-10f215ae="">Profile</span></a>
                      <a data-v-10f215ae="" class="dropdown-item notify-item"><i data-v-10f215ae="" class="mdi mdi-logout"></i> <span data-v-10f215ae="">Logout</span></a>
                    </div>
                  </li>
                </ul>
              </div>
              <div data-v-10f215ae="" class="clearfix"></div>
            </div>
          </div>
          <div data-v-10f215ae="" id="accordion" class="navbar-custom">
            <div data-v-10f215ae="" class="container">
              <div data-v-10f215ae="" id="navigation" style="display: flex !important;">
                <ul data-v-10f215ae="" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion" class="navigation-menu collapse">
                  <li data-v-10f215ae=""><a data-v-10f215ae="" class="waves-effect waves-primary active"><img data-v-10f215ae="" alt="" src="includes/home-solid.svg" class="mr-2"> <span data-v-10f215ae=""> Dashboard </span></a></li>
                  <li data-v-10f215ae=""><a data-v-10f215ae="" target="" class="waves-effect waves-primary asx"><img data-v-10f215ae="" src="includes/item-borrowing-solid.svg" alt="" class="mr-2"> <span data-v-10f215ae=""> Item Reservation </span></a></li>
                  <li data-v-10f215ae=""><a data-v-10f215ae="" target="_blank" class="waves-effect waves-primary asx"><img data-v-10f215ae="" src="includes/library-solid.svg" alt="" class="mr-2"> <span data-v-10f215ae=""> Online Library </span></a></li>
                  <li data-v-10f215ae=""><a data-v-10f215ae="" target="" class="waves-effect waves-primary asx"><img data-v-10f215ae="" src="includes/itsupp-solid.svg" alt="" class="mr-2"> <span data-v-10f215ae=""> IT Support </span></a></li>
                  <li data-v-10f215ae=""><a data-v-10f215ae="" target="" class="waves-effect waves-primary asx"><img data-v-10f215ae="" src="includes/college-consultation-solid.svg" alt="" class="mr-2"> <span data-v-10f215ae=""> College Academics Student Consultation </span></a></li>
                  <li data-v-10f215ae=""><a data-v-10f215ae="" target="" class="waves-effect waves-primary asx"><img data-v-10f215ae="" src="includes/room-reservationv2.svg" alt="" class="mr-2"> <span data-v-10f215ae=""> Room Reservation </span></a></li>
                </ul>
                <!----> <!---->
              </div>
            </div>
          </div>
        </header>
        <div data-v-37f647ee="" class="content-page">
          <div data-v-37f647ee="" class="content">
            <div data-v-37f647ee="" class="container">
              <div data-v-37f647ee="" class="mt-4">
                <div data-v-37f647ee="" class="row mt-2">
                  <div class="col-sm-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="page-title"></h4>
                  <!--<div class="btn-group">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                          <li class="breadcrumb-item">Home</li>
                          <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      </div>-->
                    </div>
                  </div>
                </div>
              </div>
              <div data-v-37f647ee="" class="row row_newdash">
                <div data-v-37f647ee="" class="col-lg-6 col-sm-12 col-md-6">
                  <h4 data-v-37f647ee=""></h4>
                  <!----<img data-v-37f647ee="" src="includes/dashlap.jpg" alt="" class="img-fluid d-block mx-auto">-->
                </div>
              </div>
              <!---->
              <div class="container">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Video</th>
                      <th>Description</th>
                      <th>Uploader</th>
                      <th>Timestamp</th>
                    </tr>
                  </thead>  
                  <tbody>
                    <?php
                      $sql = "SELECT id, title, video, description, uploader, timestamp FROM videos WHERE is_deleted = 0";
                      $query_approved = $mysqli->query($sql);

                      while ($row = $query_approved->fetch_assoc()) 
                      {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $uploader = $row['uploader'];
                        $timestamp = $row['timestamp'];
                        $video = $row['video'];
                      
                        echo '<tr>
                                <th scope="row"><center>' . $id . '</center></th>
                                <td style="white-space: nowrap; text-align: center;"><center>' . $title . '</center></td>
                                <td style="white-space: nowrap; text-align: center;"><center><a href="' . $video . '" target="_blank">' . $video . '</a></center></td>
                                <td><center>' . $description . '</center></td>
                                <td style="white-space: nowrap; text-align: center;"><center>' . $uploader . '</center></td>
                                <td style="white-space: nowrap; text-align: center;"><center>' . $timestamp . '</center></td>                  
                              </tr>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <footer class="footer mt-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                Copyright © 2023 iACADEMY. All rights reserved.
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    </div>    
    <script type="text/javascript">
      var user =  JSON.parse(localStorage.getItem("user_data"));
      var name =  user ? user.user.username + ' - ' +  user.user.first_name + ' ' +   user.user.last_name : '';
      var email =  user ? user.user.email : '';
      var type =  user ? user.user.type : '';

      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();

      Tawk_API.visitor = 
      {
          name : name,
          email : email,
      };
    </script>
</body>
</html>
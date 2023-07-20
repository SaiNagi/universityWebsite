
<!DOCTYPE html>
<html>
  <head>
    <title>Side Navigation Bar</title>
    <script
      src="https://kit.fontawesome.com/5a61e3442a.js"
      crossorigin="anonymous"
    ></script>
    <style>
      body {
        background-color: whitesmoke;
      }
      .container {
        display: flex;
        flex-direction: row;
      }

      nav {
        height: 100vh;
        width: 0;
        background-color: white;
        position: fixed;
        left: 0;
        top: 0;
        padding-top: 60px;
        transition: width 0.5s;
      }

      nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      nav li {
        padding: 10px;
      }

      nav a {
        color: black;
        text-decoration: none;
      }

      .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
      }

      .overlay-content {
        position: relative;
        width: 100%;
        margin-left: 50px;
      }

      .overlay a {
        padding: 8px;
        margin: 0 auto;
      }

      .closebtn {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 32px;
        cursor: pointer;
        color: black;
      }
      .logo1 {
        margin-left: 10px;
        width: 180px;
        height: 90px;
        border-radius: 4px;
      }
      button {
        background-color: #ff7f50;
        border: none;
        border: 2px solid #dc653a;
        margin-left: 5px;
      }
      header {
        height: 100px;
        display: flex;
        align-items: center;
        background-color: #ff7f50;
      }
      .nav-bar {
        width: 30px;
        height: 20px;
        font-size: 18px;
      }
      a {
        display: inline-block;
        margin-bottom: 5px;
      }
      .nav-icon {
        height: 30px;
        width: 30px;
      }
      header h1 {
        margin-left: 20%;
      }
      /* Dropdown menu */
      .dropdown,
      bropdown1 {
        position: relative;
      }

      .dropbtn {
        display: inline-block;
      }

      .dropdown-content,
      .dropdown-content1 {
        display: none;
        position: absolute;
        z-index: 1;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        margin-top: 8px;
        margin-right: 12px;
      }

      .dropdown-content a {
        color: black;
        display: block;
        padding: 6px 0;
        text-decoration: none;
      }

      .down-button,
      .down-button1,
      .down-button2,
      .down-button3 {
        background-color: white;
        border: none;
      }
      .circular-icon {
        font-size: 12px;
      }
      .dot-icon {
        font-size: 12px;
        margin-right: 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <button onclick="openNav()">
        <i class="fa-solid fa-bars nav-bar"></i>
      </button>
      <img src="https://i.ibb.co/Yf3SLJ9/university-logo.jpg" class="logo1" />
      <h1>Faculty S-Top</h1>
    </header>
    <div class="container">
      <nav id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
          >&times;</a
        >
        <div class="overlay-content">
          <ul>
            <li>
              <div class="dropdown">
                <i class="fa-solid fa-marker"></i>
                Marks
                
                <button class="down-button" onclick="toggleDropdown()">
                  <i
                    class="fa-solid fa-angle-down"
                    onclick="changeIcon(this)"
                  ></i>
                </button>

                <div id="dropdown-content" class="dropdown-content">
                  <a href="course.php"
                    ><i class="fa-regular fa-circle-dot dot-icon"></i> Add Marks</a
                  >
                 
                </div>
              </div>
            </li>

            <li>
              <div class="dropdown">
               <i class="fa-solid fa-pen"></i></i>
                Attendence
                <button class="down-button1" onclick="toggleDropdown1()">
                  <i
                    class="fa-solid fa-angle-down"
                    onclick="changeIcon(this)"
                  ></i>
                </button>

                <div id="dropdown-content1" class="dropdown-content1">
                  <a href="attendance.php"
                    ><i class="fa-regular fa-circle-dot dot-icon"></i>
                    Add attendence</a
                  >
                  
                  
                </div>
              </div>
            </li>

            <li>
              <div class="dropdown">
                <i class="fa-solid fa-chalkboard-user"></i></i>
                Courses
                <button class="down-button2" onclick="toggleDropdown2()">
                  <i
                    class="fa-solid fa-angle-down"
                    onclick="changeIcon(this)"
                  ></i>
                </button>

                <div id="dropdown-content2" class="dropdown-content2">
                  
                  <a href="add_courses.php">
                    <i class="fa-regular fa-circle-dot dot-icon"></i
                    >Add courses</a
                  >
                  <a href="delete_courses.php">
                    <i class="fa-regular fa-circle-dot dot-icon"></i
                    >Delete Courses</a
                  >
                </div>
              </div>
            </li>

            <li>
              <div class="dropdown">
                <i class="fa-solid fa-user nav-icon"></i>
                My Account
                <button class="down-button3" onclick="toggleDropdown3()">
                  <i
                    class="fa-solid fa-angle-down"
                    onclick="changeIcon(this)"
                  ></i>
                </button>

                <div id="dropdown-content3" class="dropdown-content3">
                  <a href="change_password.php"
                    ><i class="fa-regular fa-circle-dot dot-icon"></i>Change
                    Password</a
                  >
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <script>
        function openNav() {
          document.getElementById("myNav").style.width = "200px";
        }

        function closeNav() {
          document.getElementById("myNav").style.width = "0";
        }

        function toggleDropdown() {
          var dropdownContent = document.getElementById("dropdown-content");
          var button1 = document.querySelector("down-button");

          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        }
        function toggleDropdown1() {
          var dropdownContent = document.getElementById("dropdown-content1");
          var button1 = document.querySelector("down-button1");

          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        }
        function toggleDropdown2() {
          var dropdownContent = document.getElementById("dropdown-content2");
          var button1 = document.querySelector("down-button2");

          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        }

        function toggleDropdown3() {
          var dropdownContent = document.getElementById("dropdown-content3");
          var button1 = document.querySelector("down-button3");

          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        }

        let changeIcon = function (icon) {
          icon.classList.toggle("fa-angle-up");
        };
      </script>
    </div>
  </body>
</html>

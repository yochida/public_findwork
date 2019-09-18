<template>
  <div id="app">
    <div class="wrapper">
      <header class="main-header">
        <a class="logo">
          <span class="logo-mini">TTK</span>
          <span class="logo-lg">หางานประเทศไทย</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a href="#" data-toggle="control-sidebar">
                  <i class="fa fa-gears"></i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img style="border-radius: 20px;"
                src="https://yt3.ggpht.com/a/AGF-l7_dOUPV7wlAYhd8KM-dCiaq3t4V7xWO3lcoKg=s288-c-k-c0xffffffff-no-rj-mo" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#">
                <i class="fa fa-circle text-success"></i> Online
              </a>
            </div>
          </div>

          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="/#/">
                <i class="fa fa-th"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="/#/addwork">
                <i class="fa fa-sticky-note"></i>
                <span>เพิ่มงาน</span>
              </a>
            </li>
            <li>
              <a href="/#/allwork">
                <i class="fa fa-reorder"></i>
                <span>รวมงานทั้งหมด</span>
              </a>
            </li>
            <li class="treeview" style="height: auto;">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>ลิ้งค์หางาน</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li>
                  <a href="/#/worklink_esan">
                    <i class="fa fa-circle-o"></i> ภาคอีสาน
                  </a>
                </li>
                <li>
                  <a href="/#/worklink_huan">
                    <i class="fa fa-circle-o"></i> ภาคเหนือ
                  </a>
                </li>
                <li>
                  <a href="/#/worklink_grang">
                    <i class="fa fa-circle-o"></i> ภาคกลาง
                  </a>
                </li>
                <li>
                  <a href="/#/worklink_teit">
                    <i class="fa fa-circle-o"></i> ภาคไต้
                  </a>
                </li>
                <li>
                  <a href="/#/worklink_prarimonton">
                    <i class="fa fa-circle-o"></i> ปริมณฑล
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content">
          <router-view />
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>
          หางานประเทศไทย
          <a href="https://adminlte.io">งานราชการ</a>.
        </strong> All work in thailand
      </footer>

      <aside class="control-sidebar control-sidebar-dark"
        style="display: block; height: fit-content;">
        <div class="style-menu-head" style="text-align: center">
          <span>SETTING </span><i class="fa fa-cogs"></i>
        </div>
        <div class="style-menu" style="padding-left: 20px">
          <a href=""><span><i class="fa  fa-child"></i> แก้ไขข้อมูลส่วนตัว </span></a>
        </div>
        <div class="style-menu" style="padding-left: 20px">
          <a href=""><span><i class="fa fa-circle-o-notch"></i> เปลี่ยนรหัสผ่าน </span></a>
        </div>
        <div class="style-menu" style="padding-left: 20px">
          <a href="/register-user"><span><i class="fa fa-pencil-square-o"></i> Register </span></a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="style-menu-footer" style="text-align: center">
          <a href="/logout"><span>ออกจากระบบ </span><i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </aside>
      <!-- ทำให้ slide เต็มจอ -->
      <!-- <div class="control-sidebar-bg"></div> -->
    </div>
    <notifications group="foo" position="top right" />
  </div>
</template>

<script>
  export default {
    name: "App"
  };
</script>

<style>
  #app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .style-menu-head {
    color: #4b646f;
    height: fit-content;
    padding-bottom: 10px;
    padding-top: 10px;
    background-color: #1a2226;
  }

  .style-menu {
    font-size: 10pt;
    height: fit-content;
    padding-bottom: 10px;
    padding-top: 10px;
  }

  .style-menu:hover {
    background-color: #3b4b52;
  }

  .style-menu-footer {
    font-size: 10pt;
    height: fit-content;
    padding-bottom: 10px;
    padding-top: 10px;
    border: 1px solid #3b4b52;
  }

  .style-menu-footer:hover {
    background-color: #3b4b52;
  }
</style>
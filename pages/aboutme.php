<?php
session_start();
require_once ("./connect/connect.php");

?><!DOCTYPE html>
<html lang="fa">
  <head>
    <!--Meta Tags-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="مدیریت پروژه، دانشکده سیدالشهدا" />
    <meta
      name="description"
      content="سیستم مدیریت پروژه پایانی دانشکده فنی سیدالشهدا"
    />
    <meta name="author" content="M.Nemati" />
    <!--Title and icon in tab browser-->
    <title>سیستم مدیریت پروژه</title>
    <link rel="icon" href="/images/favicon.png" type="image/x-icon" />
    <!--Load CSS Files-->
    <link rel="stylesheet" href="/fontawesome/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="/css/font.css" />
    <link rel="stylesheet" href="/css/mainstyle.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
  </head>

  <body>
    <!--top Navigation bar-->
    <nav id="Navbar">
      <div id="menuItem">
        <ul style=" float: right; ">
          <li id="menuTitle0">
            <a href="/index.html"
              ><i class="fas fa-home" style="font-size:30px;"></i>
            </a>
          </li>
          <li id="menuTitle1"><a href="/pages/project.html">پروژه پایانی</a></li>
          <li id="menuTitle2"><a href="/pages/karamozi.html">کارآموزی</a></li>
          <li id="menuTitle3"><a href="/pages/aboutme.php">درباره ما</a></li>
        </ul>
      </div>
      <div class="subItem subItem1">
        <ul>
          <li><a href="/#">راهنمای پروژه پایانی</a></li>
          <li><a href="/#"> پروژه های انجام شده</a></li>
          <li><a href="/#">پروژه های شاخص </a></li>
        </ul>
      </div>
      <div class="subItem subItem2">
        <ul>
          <li><a href="/#">راهنمای کارآموزی</a></li>
          <li><a href="/#">درخواست کارآموزی</a></li>
        </ul>
      </div>
      <div class="subItem subItem3">
        <ul>
          <li><a href="/#">معرفی توسعه دهندگان</a></li>
          <li><a href="/#">دانشکده سیدالشهدا</a></li>
          <li><a href="/#">ارتباط با ما</a></li>
        </ul>
      </div>
    </nav>

    <!--main header image or slider-->
    <header id="topHeader">
      <h1 id="topTiter">وب سایت مدیریت پروژه و کارآموزی</h1>
      <h2>
        گروه کامپیوتر دانشکده فنی
        <span style="color:red"> سیدالشهدا</span>
      </h2>
      <img src="/images/topheader.png" alt="هدر اصلی سایت" />
    </header>

    <!-- Main Content-->
    <div id="mainContent">
      <aside id="rightPanel">
        <a href="/pages/register/register.html">ثبت نام</a>
        <br>
        <a href="/pages/login/login.php"> ورود اعضا</a>
      </aside>
      <section style='height:100%'  id="mainPanel">
        <div style="direction: rtl;margin: 23px;text-align: right;" class="card">
            <div class="card-header">
              ثبت نظر
            </div>
            <div class="card-body">
              <h5 class="card-title">شما هم از تجربه خود بنویسید</h5>
              <p class="card-text">آنچه از این دانشگاه میدانید با سایر کاربران به اشتراک بگذارید</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                ثبت نظر
              </button>
              
              <!-- Modal -->
              
            </div>
          </div>
          <?php 
          $st= $strcon->prepare("SELECT * FROM comment");
          $st->execute();
          $st->setFetchMode(PDO::FETCH_ASSOC);
          $rows=$st->fetchAll();
          if($st->rowCount()>0){
            foreach ($rows as $value) {
              echo '<div style="direction: rtl;margin: 23px;text-align: right;" class="card">
                        <div class="card-header"><span>  '.$value['name'].' گفته : </span></div>
                        <div class="card-body">
                          '.$value['comment'].' 
                        </div>
                  </div>';
            }
          }else{
            echo '<div style="direction: rtl;margin: 23px;text-align: right;" class="card">
                        <div class="card-body">
                          هیچ نظری ثیت نشده است
                        </div>
                  </div>';
          }
          ?>
          
        
      </section>
    </div>
    <!-- modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="./comment/save.php" method="post">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                              <label style=" float: right; " class=" label" for="">نام شما</label>
                              <input class="form-control" name="name" type="text">
                      </div>
                      <div class="modal-body">
                              <label style=" float: right; " class=" label" for="">ایمیل شما</label>
                              <input class="form-control" name="email" type="text">
                          </div>
                      <div class="modal-body">
                          <label style=" float: right; " class=" label" for="">نظر شما</label>
                            <textarea   name="comment" class="form-control"  rows="5"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">ذخیره نظر</button>
                    </div>
            </form>
          </div>
        </div>
      </div>
    <!-- Footer -->
    <footer>
      <div id="rightSide">
        <h3>وب سایت های مرتبط با درس</h3>
        <p><a href="/http://www.lecturenotes.ir/" target="_blank">Lecture Notes</a></p>
        <p><a href="/https://www.w3schools.com/" target="_blank">w3schools</a></p>
        <p><a href="/https://www.sololearn.com/" target="_blank">Solo learn</a></p>
        <p><a href="/https://github.com/" target="_blank">GitHub</a></p>
      </div>
      <div id="leftSide">
        <div id="googleMap">
          <p>مکان ما در گوگل:</p>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12761.39837092921!2d49.489393!3d36.905905!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1addafc4dfced6b4!2z2K_Yp9mG2LTaqdiv2Ycg2YHZhtuMINmIINit2LHZgdmHINin24wg2LPbjNiv2KfZhNi02YfYr9inINix2LPYqtmFINii2KjYp9iv!5e0!3m2!1sen!2sus!4v1554645214558!5m2!1sen!2sus"
            width="400"
            height="200"
            frameborder="0"
            style="border:0"
            allowfullscreen
          ></iframe>
        </div>
        <div id="socialIcons">
          <p>ما را در شبکه های اجتماعی دنبال کنید:</p>
          <a href="/https://www.instagram.com/m.nemati1396"
            ><i class="fab fa-instagram" style="font-size:60px;"></i
          ></a>
          <a href="/https://t.me/m_nemati2002"
            ><i class="fab fa-telegram" style="font-size:60px;"></i
          ></a>
          <a href="/https://www.twitter.com/m_nemati2002"
            ><i class="fab fa-twitter" style="font-size:60px;"></i
          ></a>
          <a href="/https://www.facebook.com/m_nemati2002"
            ><i class="fab fa-facebook" style="font-size:60px;"></i
          ></a>
        </div>
      </div>
      <div id="copyLeft">
        <p>دانشجویان کامپیوتر دانشکده سیدالشهدا</p>
        <p>بهار ۱۳۹۸</p>
      </div>
    </footer>
    <!-- To Top Button -->
    <div id="toTop">
      <i class="fas fa-angle-double-up" style="font-size:60px;"></i>
    </div>

    <!-- Load JavaScript Files-->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/script.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" -->
    <!-- crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  </body>
</html>

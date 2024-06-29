<article>
    <div class='ad_vertical_left'> reklama </div>
    <div class='ad_vertical_right'> reklama </div>

    <div class='newsy_reklamy'>
        <div class='tytul_podtytul'>
            <h1><?php echo $row['title']?></h1>
            <h6><?php echo $row['date']?></h6>
            <h4><?php echo $row['subtitle']?></h4>
        </div>
        <div class='zdjecie'>
             <img src='<?php echo $row['img_1']?>'/>
        </div>
        <div class='zestaw_reklam1'>
            <div class='ad_horizontal'>reklama</div>
            <div class='ad_horizontal'>reklama</div>
        </div>
        <div class='wstep'>
            <p>
                <?php echo $row['rozpoczecie']?>
            </p>
        </div>
        <div class='zestaw_reklam2'>
            <div class='ad_horizontal'>reklama</div>
        </div>
        <div class='rozwiniecie'>
            <p>
                <?php echo $row['rozwiniecie']?>
            </p>
        </div>
        <div class='zdjecie_drugie'>
            <img src='<?php echo $row['img_2']?>'/>
        </div>
        <div class='zakonczenie'>
            <p>
                <?php echo $row['zakonczenie']?>
            </p>
        </div>
        <div class='zestaw_reklam3'>
            <div class='ad_horizontal'>reklama</div>
            <div class='ad_horizontal'>reklama</div>
        </div>
    </div>
</article>
    <style>


        /* główny kontener reści */

        article{
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .ad_vertical_left{
            background-color: #cecece;
            margin-top: 1px;
            width: 7%;
            height: 55%;
            position: fixed;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ad_vertical_right{
            background-color: #cecece;
            margin-top: 1px;
            width: 7%;
            height: 55%;
            position: fixed;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* reklama pozioma na dole ekranu */

        .reklama_fixed_pozioma{
            background-color: #cecece;
            width: 60%;
            height: 100px;
            position: fixed;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

                /* CSS */


        /* styl danego postu ||NIEAKTYWNE||*/

        .tytul_podtytul{
            width: calc(100% - 30px);
            padding: 15px;
            margin-bottom: 20px;
            font-size: 25px;
            overflow: hidden;
            border-bottom: 1px solid black;
        }

        .tytul_podtytul h1{
            margin-bottom: 40px;
        }

        .tytul_podtytul h6{
            margin-bottom: 5px;
        }

        .zdjecie{
            width: 90%;
            height: 700px;
            overflow: hidden;
            display: flex;
            align-content: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .zdjecie img{
            height: 100%;
        }

        .zestaw_reklam1{
            width: 95%;
            margin-top: 10px;
            height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .wstep{
            width: 100%;
            font-size: 30px;
            font-family:sans-serif;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .zestaw_reklam2{
            width: 95%;
            margin-top: 10px;
            height: 130px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .rozwiniecie{
            border-top: 1px solid black;
            padding-top: 30px;
            width: 100%;
            font-size: 30px;
            font-family:sans-serif;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 40px;
            text-align: center;
        }

        .zdjecie_drugie{
            width: 90%;
            height: 700px;
            overflow: hidden;
            display: flex;
            align-content: center;
            justify-content: center;
            margin-bottom: 10px;
        }
            
        .zdjecie img{
            height: 100%;
        }

        .zakonczenie{
            width: 100%;
            font-size: 30px;
            font-family:sans-serif;
            font-weight: 700;
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
        }

        .zestaw_reklam3{
            width: 95%;
            margin-top: 10px;
            height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 10px;
        }


    </style>

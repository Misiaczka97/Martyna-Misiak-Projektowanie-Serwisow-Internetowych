

<header>
    <div id="navbar">
        <div id="burger">
            <img id="settings" src="2svgs/Menu.svg" alt="settings">
        </div>
        <div id="logo_categories">
            <a id="logo" href="main.php"><img src="2svgs/rafa24logo.png" alt="logo"></a>
            <div class="category" id="polityka_obronna">polityka obronna</div>
            <div class="category" id="przemysl_zbrojeniowy">przemysł zbrojeniowy</div>
            <div class="category" id="ukraina"><a>ukraina</a></div>
            <div class="category" id="psily_zbrojne">siły zbrojne</div>
            <div class="category" id="geopolityka">geopolityka</div>
            <div class="category" id="video">video</div>
        </div>
        <div id="premium_login_search">
            <div id="premium">Premium</div>
            <div id="login_popup">Zaloguj się</div>
            <div id="search"><img src="2svgs/search.svg" alt="magnyfaing glass"></div>
        </div>
    </div>
    <div id="ad_navbar">reklama</div>
    <div id="margin"></div>
</header>
<style>
    #navbar{
        position: fixed;
        z-index: 9999;
        display: flex;
        color: white;
        width: 100%; 
        height: 70px; 
        background-color: #141414;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    #burger{

        display: flex;
        justify-content: space-between;
        width: 13%;
        margin-left: 0.5%;
    }

    #burger>img{
        cursor:pointer;
        width: 50;
    }

    #logo_categories{
        margin-right: 5%;
        font-weight: 700;
        width: 60%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    #logo_categories>img{
        cursor: pointer;
        width: 111;
    }

    .category{
        padding: 10px;display: flex;align-items: center;
    }

    .category:hover{
        color: rgb(199, 199, 199);
    }

    .category{
        text-decoration: none;
        color: white;
    }

    #premium_login_search{
        width: 15%;
        margin-right: 0.5%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    #premium{
        border: #ebebeb63 solid 0.1px;
        padding: 10px;
        margin-left: 7%;
        cursor: pointer;
    }

    #premium:hover{
        background-color: #1f1f1f;
        color: #cccccc;
    }

    #zaloguj_sie{
        border: #ebebeb63 solid 0.1px;
        padding: 10px;
        margin-right: 13%;
        cursor: pointer;
    }

    #login_popup:hover{
        background-color: #1f1f1f;
        color: #cccccc;
    }

    #search{
        cursor: pointer;
        height: 30;
    }

    #ad_navbar{
        width: 100%;
        height: 130px;
        background-color: #cecece;
        display: flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        margin-top: 70px;
    }

    #margin{
        width: 100%;
        height: 200px;

    }
</style>
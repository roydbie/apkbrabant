<style>
    .menubar {
        height:80px;
        width:100vw;
        color:grey;
        font-size: 0.8rem;
    }

    .menu-item {
        display: inline-block;
        margin-left:8px;
        margin-top: 6px;
        margin-right:8px;
        cursor:pointer;
        text-align: center!important;
    }

    .menucircle {
        border-radius: 10px;
        width:52px;
        height:50px;
        background-color: white;
        box-shadow: 0px 5px 10px #dedede;
        margin-bottom:10px!important;

    }
</style>
<h5 class="mt-3" style="margin-left:50px;">Welkom Roy de Bie!</h5>
<div class="menubar">
    <div class="row">
        <div class="col" style="margin-left:50px;">
            <div class="menu-item" onclick="location.href='/';" style="margin-left:0px;">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128203;</p>
                </div>
                Overzicht
            </div>
            <div class="menu-item" onclick="location.href='/agenda';">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128198;</p>
                </div>
                    Agenda
            </div>
            <div class="menu-item">
                <div class="menucircle m-auto">
                    <p class="pt-1" style="font-size: 30px;">&#128230;</p>
                </div>
                Magazijn
            </div>
            <div class="menu-item">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128200;</p>
                </div>
                Dashboard
            </div>
            <div class="menu-item">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128269;</p>
                </div>
                Zoeken
            </div>
            <div class="menu-item" style="visibility:hidden;">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128269;</p>
                </div>
                Zoeken
            </div>
            <div class="menu-item" id="inputKenteken">
                <div class="menucircle m-auto" style="width:100px!important;">
                    <input type="text" maxlength="6" class="form-control" placeholder="" id="kenteken" style="font-size:0.8rem;height:100%;text-align: center;">
                </div>
                Voer kenteken in
            </div>
            <div class="menu-item" id="submitButton" onclick="naarKentekenSearch();">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128077;</p>
                </div>
                &nbsp;
            </div>
        </div>
        <div class="col" style="margin-right:50px;text-align:right;">
            <div class="menu-item" onclick="history.go(-1);">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128281;</p>
                </div>
                Stap terug
            </div>
            <div class="menu-item">
                <div class="menucircle m-auto">
                    <p class="pt-2" style="font-size: 25px;">&#128237;</p>
                </div>
                Uitloggen
            </div>
        </div>
    </div>
</div>

<script>
    function naarKentekenSearch(){
        var x = document.getElementById('kenteken').value;
        console.log(x);
        location.href = `/kentekensearch/kenteken=${x}`;
    }

    var input = document.getElementById("inputKenteken");

    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            naarKentekenSearch();
        }
    });
</script>

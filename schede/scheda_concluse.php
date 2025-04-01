<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<h1 align="center">Schede Concluse</h1>

<form onsubmit="return false">

    <!-- indice -->
    <div class="col-5" style="width:15%;">
        <label style="font-size: 14px; color: #000;" align="center">
            Id caso<br/>
        </label>
    </div>
    <div class="col-6" style="width:15%;">
        <label style="font-size: 14px; color: #000;" align="center">
            Tipologia<br/>
        </label>
    </div>
    <div class="col-4" style="width:25%;">
        <label style="font-size: 14px; color: #000;" align="center">
            Regione<br/>
        </label>
    </div>
    <div class="col-6" style="width:15%;">
        <label style="font-size: 14px; color: #000;" align="center">
            Data invio<br/>
        </label>
    </div>
    <div class="col-6" style="width:15%;">
        <label style="font-size: 14px; color: #000;" align="center">
           <?php
                if($_SESSION["tipo_usr"] == 'reg'){
                    echo "Richiedi sblocco <br/>";
                }  
                else if($_SESSION["tipo_usr"] == 'naz'){
                    echo "Sblocca scheda <br/>";
                }     
            ?>
        </label>
    </div>
    <div class="col-6" style="width:15%;">
        <label style="font-size: 14px; color: #000;" align="center">
            Visualizza<br/>
        </label>
    </div>
    <?php
        require_once("db/utils.php");
        listCloseds();
    ?>
    
     

</form>
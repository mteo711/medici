<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script>
  
</script>

<h1 align="center">Schede Aperte</h1>

<form onsubmit="return false">

    <!-- indice -->
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Id caso<br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Regione<br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Tipologia<br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Invia<br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Cancella<br/>
        </label>
    </div>
    <div class="col-5">
        <label style="font-size: 14px; color: #000;" align="center">
            Modifica<br/>
        </label>
    </div>

    <?php
        if($_SESSION["tipo_usr"] == 'reg'){ 
            require_once("db/utils.php");
            listOpen();
        }  
        else if($_SESSION["tipo_usr"] == 'naz'){
            require_once("db/utils.php");
            listOpenNaz();
        }
            
            
    ?>
    
</form>
<!--
 * User: lucaferrari
 * Date: 12/06/15
 */
 -->
<script>
  
</script>

<h1 align="center">Risultati</h1>

<form onsubmit="return false">

    <!-- indice -->
    <div class="col-4" style="width:13.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Id caso<br/>
        </label>
    </div>
    <div class="col-4" style="width:13.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Tipologia<br/>
        </label>
    </div>
    <div class="col-5" style="width:20.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Regione<br/>
        </label>
    </div>
    <div class="col-5" style="width:14.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Data Creazione<br/>
        </label>
    </div>
    <div class="col-5" style="width:14.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Data Invio<br/>
        </label>
    </div>
    <div class="col-5" style="width:12.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Visualizza<br/>
        </label>
    </div>
    <div class="col-5" style="width:12.28%">
        <label style="font-size: 14px; color: #000;" align="center">
            Sblocca<br/>
        </label>
    </div>
    
    <?php
        require_once("db/utils.php");
        listResult();
    ?>
</form>
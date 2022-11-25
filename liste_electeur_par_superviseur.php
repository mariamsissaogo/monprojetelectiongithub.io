<?php
  include_once 'connexion.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.main.js"></script>

</head>
<body>
    <form action="" method="post">
    <center style="margin-top: 50px;" id="id_list_deroulante_v"> 
    <label for="">Lieu de vote: </label>
    <select name="agent" id="agent" required>;
        <?php
                
                $statement =  $db->prepare("SELECT * FROM agent");
                $statement->execute();
                $clients = $statement->fetchAll();
                
                echo '<option value="">selectionner un agent</option>';
               
                    foreach ($clients as $key => $value) {
                      
                        echo '<option value="'.$value['NUMCNI_AGENT'].'">'. $value['NOM'] ." ".$value['PRENOMS'] .'</option>';
                    }
               
            ?>
             </select>
             </center>
                     
                         <br/><br/>
                         <center>
                         <h3 style="margin-top: 30px;">LISTE DES ELECTEURS PAR LIEU DE VOTE </h3></center>
         <table class="table table-bordered border-primary container prime" id="first"  >
        <thead>
             <th >N°</th> 
               <th scope="col">Num&eacute;ro CNI</th>
                <th scope="col">Nom & Prénoms</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Contact</th>
                <th scope="col">Quartier/Village</th>
                <th scope="col">Lieu de vote</th>
                <th scope="col">Sexe</th>
            
               
</thead>

<tbody id = 'table'>

</tbody>
</table>
            
</form>
 
<script src="../Public/js/bootstrap.js"></script>
<script src="../Public/js/bootstrap.bundle.js"></script>
<script src="../Public/js/custom.js"></script>
<script>



let i = 0;
 
    let createelement = function(data) {

      let tr = document.createElement('tr');
      let td0 = document.createElement('td');
      let td1 = document.createElement('td');
      let td2 = document.createElement('td');
      let td3 = document.createElement('td');
      let td4 = document.createElement('td');
      let td5 = document.createElement('td');
      let td6= document.createElement('td');
      let td7 = document.createElement('td');

      
      td0.innerText = i;
      i += 1;
      td1.innerText = data.NUM_CNI;
      td2.innerText = data.NOM;
      td3.innerText = data.DATENAISS.split("-")[2] + '-' +data.DATENAISS.split("-")[1]+'-' + data.DATENAISS.split("-")[0] ;
      td4.innerText = data.CONTACT;
      td5.innerText = data.VILLAGE_QUARTIER;
      td6.innerText = data.LIEU_VOTE;
      td7.innerText = data.SEXE;
      tr.appendChild(td0);
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);
      tr.appendChild(td4);
      tr.appendChild(td5);
      tr.appendChild(td6);
      tr.appendChild(td7);

      document.querySelector('#table').appendChild(tr);
    }


let xhr = new XMLHttpRequest();

document.querySelector('#agent').addEventListener('change', function(){
  document.querySelector('#table').innerHTML = '';
  i = 1;
  let data = {
    agent: document.querySelector('#agent').value
  }
  xhr.open('POST', 'liste_electeur_agent.php', true);
  xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8');
  xhr.send(JSON.stringify(data));

  xhr.onreadystatechange = () => {
    if(xhr.readyState === 4) {
      let _data = xhr.responseText.split("}{");
      if(_data.length == 1) {
          let seule = JSON.parse( _data.join());
          createelement(seule);
          } else{
            premier = JSON.parse( _data.slice(0,1).join() + '}');
            dernier = JSON.parse('{' + _data.slice( _data.length - 1).join());
            createelement(premier);
            if(_data.length > 2) {
              for(j = 1; j <= _data.length - 2; j ++ ) {
                let milieu = JSON.parse('{' + _data[j] + '}');
                createelement(milieu);
            }
            }
            createelement(dernier);
    }
  }

}
})




      
</script>
</body>
</html>  







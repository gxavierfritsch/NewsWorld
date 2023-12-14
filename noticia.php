<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../NewsWorld-main/css/styles.css" />
  <title>News Word</title>
</head>

<body>
  <header>
    <div class="cabecalho">
      <h1><a href="index.php">NEWS WORD</a></h1>
      <div class="infos">
        <div class="data">
          <b>
            <p id="dataHora"></p>
          </b>
        </div>
        <div class="moeda">
          <span>IBOVESPA <em>+2,56(+1,32%)</em></span>
          <span>REAL R$ 2,38(+1,32%)</span>
        </div>
      </div>
    </div>
  </header>
  <nav>

    
    <?php
    include("../NewsWorld-main/php/comm.php");

    echo "<div class='navegacao'>";
    echo "<ul>";

    
    $categorias = array(
        'mundo' => 'MUNDO',
        'brasil' => 'BRASIL',
        'politica' => 'POLITICA',
        'economia' => 'ECONOMIA',
        'ciencia' => 'CIENCIA',
        'saude' => 'SAUDE',
        'esportes' => 'ESPORTES',
        'arte' => 'ARTE',
        'musica' => 'MUSICA',
        'culinaria' => 'CULINARIA',
        'ferias' => 'FERIAS',
        'jogos' => 'JOGOS'
    );

    foreach ($categorias as $categoriaKey => $categoriaValue) {
        echo "<li><a href='categoria.php?categoria=$categoriaKey'>$categoriaValue</a></li>";
    }

    echo "</ul>";
    echo "</div>";
    ?>
    </nav>

  <section>
    <div  class="main" style="padding-right: 2%">
      <?php
      include("../NewsWorld-main/php/comm.php");

      $id = $_GET["id"];
      
      $click = "UPDATE noticia SET cliques = cliques + 1 WHERE id = $id";
    if (mysqli_query($conn, $click)) {
        // Selecionar e exibir os detalhes da notícia
        $sql = "SELECT id, titulo, texto, categoria, cliques, caminho, nome FROM noticia WHERE id = $id";
        $result = mysqli_query($conn, $sql);}

      if (mysqli_num_rows($result) > 0) {
        echo "<section style='display:flex; flex-direction: column'>";
        
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<section style='display:flex; flex-direction:row; justify-content: space-around; border-bottom: black 2px solid'>";
          echo "<div style='display:flex; flex-direction:column;margin-top: 10px; width: 400px'>";  //COMECA CLASSE TITULAR
      
          echo "<div>";
          echo "<h2>" . $row["titulo"] .   "</h2>";
          echo "</div>";

          echo "<div>";
          echo "<br>";
          echo "</div>";

          echo "<div>";
          echo "<p>" . $row["texto"] . "</p>";
          echo "</div>";



          echo "</div>";  //FINALIZA CLASSE TITULAR
      
          //
      
          echo "<div style='margin-top: 10px'>";  //COMECA CLASSE IMAGEM
      
          echo "<div style=''>";
          echo "<img style='width: 300px' src='" . "../NewsWorld-main/php/" . $row["caminho"] . "' alt='" . $row["nome"] . "' style='max-width: 200px;'>";
          echo "</div>";

          echo "</div>";  //FINALIZA CLASSE  IMAGEM
      


          echo "</section>";
        }
        
        echo "</section>";
      
      } else {
        echo "0 resultados";
      }

      mysqli_close($conn);
      ?>

    </div>
    <aside>
      <div class="visitados">
        <header>
          <h2>Mais Visitados</h2>
        </header>
        <div class="listaDeConteudos">
          <?php
          include("../NewsWorld-main/php/comm.php");



          $sql = "SELECT id, titulo, caminho, nome FROM noticia ORDER BY cliques DESC LIMIT 5";
          $result = $conn->query($sql);

          $numerador = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<div class='conteudo'>";
            echo "<div class='numerador'><span>" . $numerador . "</span></div>";
            echo "<img src='" . "../NewsWorld-main/php/" . $row["caminho"] . "' alt='" . $row["nome"] . "' />";
            echo "<h3>" . "<a href='noticia.php?id=" . $row["id"] . "'>" . $row["titulo"] . "</a>" . "</h3>";
            echo "</div>";
            $numerador++;
          }

          $conn->close();
          ?>
        </div>
      </div>
      <div style="text-align: center; padding-bottom: 20px" class="ads">

        <img style=" max-width: 300px; max-height:400px" src="./imgads/retokk.jpg" alt="anuncio do patata" />
        <img style=" max-width: 300px; max-height:400px" src="./imgads/images.jpg" alt="anuncio do patata" />

      </div>
      <div class="vocePodeGostar">
        <header>
          <h2>Você pode gostar</h2>
        </header>
        <div style="width:400px; height:120px" class="conteudo">
          <?php
          include("../NewsWorld-main/php/comm.php");

          $sql = "SELECT id, titulo, caminho, nome FROM noticia ORDER BY RAND() LIMIT 1";
          $result = $conn->query($sql);

          $numerador = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<div class='conteudo'>";
            echo "<img src='" . "../NewsWorld-main/php/" . $row["caminho"] . "' alt='" . $row["nome"] . "' />";
            echo "<h3>" . "<a href='noticia.php?id=" . $row["id"] . "'>" . $row["titulo"] . "</a>" . "</h3>";
            echo "</div>";
            $numerador++;
          }
          $conn->close();
          ?>
        </div>
        <div style="width:400px; height:120px" class="conteudo">
          <?php
          include("../NewsWorld-main/php/comm.php");

          $sql = "SELECT id, titulo, caminho, nome FROM noticia ORDER BY RAND() LIMIT 1";
          $result = $conn->query($sql);

          $numerador = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<div class='conteudo'>";
            echo "<img src='" . "../NewsWorld-main/php/" . $row["caminho"] . "' alt='" . $row["nome"] . "' />";
            echo "<h3>" . "<a href='noticia.php?id=" . $row["id"] . "'>" . $row["titulo"] . "</a>" . "</h3>";
            echo "</div>";
            $numerador++;
          }
          $conn->close();
          ?>
        </div>
        <div style="width:400px; height:120px" class="conteudo">
          <?php
          include("../NewsWorld-main/php/comm.php");

          $sql = "SELECT id, titulo, caminho, nome FROM noticia ORDER BY RAND() LIMIT 1";
          $result = $conn->query($sql);

          $numerador = 1;
          while ($row = $result->fetch_assoc()) {
            echo "<div class='conteudo'>";
            echo "<img src='" . "../NewsWorld-main/php/" . $row["caminho"] . "' alt='" . $row["nome"] . "' />";
            echo "<h3>" . "<a href='noticia.php?id=" . $row["id"] . "'>" . $row["titulo"] . "</a>" . "</h3>";
            echo "</div>";
            $numerador++;
          }
          $conn->close();
          ?>
        </div>


      </div>
      <div style="text-align: center; padding-bottom: 20px" class="ads">

        <img style=" max-width: 300px; max-height:400px" src="./imgads/download.jpg" alt="anuncio do patata" />
        <img style=" max-width: 300px; max-height:400px" src="./imgads/cart.jpg" alt="anuncio do patata" />

      </div>




    </aside>
  </section>

  <script src="js/DataAtual.js"></script>
</body>
<a href="/NewsWorld-main/php/form_login.php">LOGIN</a>

</html>
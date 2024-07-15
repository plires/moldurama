<header class="container-fluid mb-0">
  <div class="row header_top">
    <div class="col-md-12 header_datos">
      <a class="transition phone" href="tel:1147675100">11.4767.5100</a>
      <a class="transition phone" href="tel:77237758">11.7723.7758</a>
      <a
        class="transition phone"
        target="_blank"
        rel="nofollow noopener noreferrer"
        href="https://web.whatsapp.com/send?phone=+5491135968714&text=Hola!%20Necesito%20hacer%20una%20consulta!"
        >Wap: 11.3596.8714</a
      >
      <a class="transition mail" href="mailto:info@moldurama.com.ar"
        >info@moldurama.com.ar</a
      >
      <div class="redes">
        <a
          target="_blank"
          rel="noopener"
          class="transition"
          href="https://www.facebook.com/profile.php?id=100091756391712"
        >
          <i class="transition fab fa-facebook"></i>
        </a>
        <a
          target="_blank"
          rel="noopener"
          class="transition"
          href="https://www.instagram.com/molduramaok/"
        >
          <i class="transition fab fa-instagram"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="transition navbar-brand" href="./">
        <img class="img-fluid logo" src="img/header/logo-moldurama.png" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse transition"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav transition">
          <?php $resultado = ($current == 'productos') ? "active" : " "; ?>

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="./"
              id="navbarDropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#"
                  >Revestimientos</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./wall-panel-acanalado.php"
                      >Wall Panel Acanalado</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./wall-panel-ranurados.php"
                      >Wall Panel Ranurado</a
                    >
                  </li>
                </ul>
              </li>

              <div class="dropdown-divider"></div>

              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Zócalos</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./zocalo-mdf-zfl.php"
                      >Curvo</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./zocalo-mdf-zfr.php"
                      >Recto</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./zocalo-mdf-zfc.php"
                      >Con Calle</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./zocalo-mdf-zff.php"
                      >Fantasía</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./zocalo-mdf-zfm.php"
                      >Moldurado</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./cubrezocalo-cz.php"
                      >Cubre Zócalos</a
                    >
                  </li>
                </ul>
              </li>

              <div class="dropdown-divider"></div>

              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#"
                  >Contramarcos</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./contramarco-recto.php"
                      >Recto</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./contramarco-curvo.php"
                      >Curvo</a
                    >
                  </li>
                </ul>
              </li>

              <div class="dropdown-divider"></div>

              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#"
                  >Guardasillas</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./guardasilla-liso-gfm.php"
                      >Moldurado</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="./guardasilla-recto-gfr.php"
                      >Recto</a
                    >
                  </li>
                </ul>
              </li>

              <div class="dropdown-divider"></div>

              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#"
                  >Respaldos de Cama</a
                >
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./respaldos-cama-1-plaza.php"
                      >1 Plaza</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="./respaldos-cama-2-plazas.php"
                      >2 Plazas</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="./respaldos-cama-king-size.php"
                      >King</a
                    >
                  </li>
                </ul>
              </li>

              <!-- <div class="dropdown-divider"></div> -->

              <!-- <li><a class="dropdown-item" href="#">Espejos</a></li> -->
            </ul>
          </li>

          <?php $resultado = ($current == 'nosotros') ? "active" : " "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="nosotros.php">Nosotros</a>
          </li>
          <?php $resultado = ($current == 'proyectos') ? "active" : " "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="proyectos.php">Proyectos</a>
          </li>
          <?php $resultado = ($current == 'contacto') ? "active" : " "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="contacto.php">Consultar</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

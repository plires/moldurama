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
        <a class="transition" href="#"
          ><i class="transition fab fa-facebook"></i
        ></a>
        <a class="transition" href="#"
          ><i class="transition fab fa-instagram"></i
        ></a>
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
          <?php $resultado = ($current =='productos') ? "active":" "; ?>
          <li class="nav-item dropdown transition">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Productos
            </a>
            <div
              class="dropdown-menu transition"
              aria-labelledby="navbarDropdown"
            >
              <div class="dropdown-divider"></div>
              <a class="dropdown-item transition" href="zocalo-mdf-zfl.php"
                >Zócalo MDF Curvo ZFL</a
              >
              <a class="dropdown-item transition" href="zocalo-mdf-zfr.php"
                >Zócalo MDF Recto ZFR</a
              >
              <a class="dropdown-item transition" href="zocalo-mdf-zfc.php"
                >Zócalo MDF Con Calle Recto ZFC</a
              >
              <a class="dropdown-item transition" href="zocalo-mdf-zff.php"
                >Zócalo MDF Fantasía ZFF</a
              >
              <a class="dropdown-item transition" href="zocalo-mdf-zfm.php"
                >Zócalo MDF Moldurado ZFM</a
              >
              <div class="dropdown-divider"></div>
              <a class="dropdown-item transition" href="cubrezocalo-cz.php"
                >Cubre Zócalo MDF CZ</a
              >
              <div class="dropdown-divider"></div>
              <a
                class="dropdown-item transition"
                href="contramarco-recto-cfr.php"
                >Contramarco MDF Recto CFR</a
              >
              <div class="dropdown-divider"></div>
              <a
                class="dropdown-item transition"
                href="guardasilla-liso-gfm.php"
                >Guardasilla MDF Moldurado GFM</a
              >
              <a
                class="dropdown-item transition"
                href="guardasilla-recto-gfr.php"
                >Guardasilla MDF Recto GFR</a
              >
            </div>
          </li>

          <?php $resultado = ($current =='nosotros') ? "active":" "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="nosotros.php">Nosotros</a>
          </li>
          <?php $resultado = ($current =='proyectos') ? "active":" "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="proyectos.php">Proyectos</a>
          </li>
          <?php $resultado = ($current =='contacto') ? "active":" "; ?>
          <li class="nav-item <?php echo $resultado ?>">
            <a class="nav-link transition" href="contacto.php">Consultar</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

<header>
      <a href="<?= APP_ROOT ?>/">
        <img
          class="logo"
          src="/assets/logo/logo_nexus_white.svg"
          title="Accueil"
          alt="Logo Nexus"
        />
      </a>
      <div id="menuburger">
        <nav>
          <ul>
            <li>
              <a class="navlink" href="<?= APP_ROOT ?>/accueil-bibliotheque"
                >Bibliothèque</a
              >
            </li>
            <li>
              <a
                class="navlink"
                href="<?= APP_ROOT ?>/recherche-de-joueur"
                >Joueurs</a
              >
            </li>
            <li>
              <a class="navlink" href="/quiz/quiz-accueil.php">Quiz</a>
            </li>
            <li>
              <a class="navlink" href="<?= APP_ROOT ?>/messagerie"
                >Messagerie</a
              >
            </li>
          </ul>
        </nav>
        <div class="header-moitie">
          <div class="rechercher">
            <input
              class="FormulaireRechercher navlink"
              type="text"
              placeholder="Rechercher"
            />
            <button class="SubmitRecherche" type="submit">
              <img src="/assets/Icone/magnifying-glass-solid-blanc.svg" alt="recherche" />
            </button>
          </div>
          <button class="BoutonConnexion navlink">Connexion</button>
        </div>
      </div>
      <a href="#" id="openMenuBurger"
        ><!--TODO javascript pour ouvrir le menu burger et afficher la navbar mobile-->
        <span class="burger-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </a>
    </header>
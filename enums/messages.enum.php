<?php

enum AppMessages: string {
  
    case MI = 'error.matricule_existant';
    case CLI = 'error.client_inexistant';
    case NI = 'error.numero_invalide';
    case CI = 'error.choix_invalide';
    

    case MENU_AJOUTER_CLIENT = 'menu.ajouter_client';
    case MENU_LISTER_CLIENTS = 'menu.lister_clients';
    case MENU_AJOUTER_NUMERO = 'menu.ajouter_numero';
    case MENU_LISTER_NUMEROS = 'menu.lister_numeros';
    case MENU_DASHBOARD = 'menu.dashboard';

    case MENU_FILTRER_OPERATEUR = 'menu.filtrer_operateur';
    case MENU_CLIENT_PLUS_NUMEROS = 'menu.client_plus_numeros';
    case MENU_OPERATEUR_DOMINANT = 'menu.operateur_dominant';
    case MENU_QUITTER = 'menu.quitter';
    

    case SYSTEM_DEMANDE_OPERATEUR = 'system.demande_operateur';
    case SYSTEM_DEMANDE_MATRICULE = 'system.demande_matricule';
    case SYSTEM_DEMANDE_NUMERO = 'system.demande_numero';
    case SYSTEM_DEMANDE_NOM = 'system.demande_nom';
    case SYSTEM_DEMANDE_PRENOM = 'system.demande_prenom';


    case VIEW_TITRE_APPLICATION = 'view.titre_application';




    
    case VIEW_TITRE_AJOUT_CLIENT = 'view.titre_ajout_client';
    case VIEW_TITRE_LISTE_CLIENTS = 'view.titre_liste_clients';
    case VIEW_TITRE_AJOUT_NUMERO = 'view.titre_ajout_numero';
    case VIEW_ENTETE_MATRICULE = 'view.entete_matricule';
    case VIEW_ENTETE_NOM = 'view.entete_nom';
    case VIEW_ENTETE_PRENOM = 'view.entete_prenom';
    case VIEW_ENTETE_NUMERO = 'view.entete_numero';
    case VIEW_ENTETE_OPERATEUR = 'view.entete_operateur';



    case CONFIRM_CLIENT_AJOUTE = 'confirm.client_ajoute';
    case CONFIRM_NUMERO_AJOUTE = 'confirm.numero_ajoute';

    public function text(): string {
        $texts = [
      
            'error.matricule_existant' => "Erreur : Le matricule existe déjà",
            'error.client_inexistant' => "Erreur : Client introuvable",
            'error.numero_invalide' => "Erreur : Numéro invalide ou déjà existant",
            'error.choix_invalide' => "Erreur : Choix invalide",
     
            'menu.ajouter_client' => "1. Ajouter un Client",
            'menu.ajouter_numero' => "2. Ajouter un numéro",
            'menu.lister_clients' => "3. Lister les Clients",
            'menu.lister_numeros' => "4. Lister les numéros",
            'menu.dashboard' => "5. Dashboard",
            'menu.client_plus_numeros' => "Client avec plus de numéros",
            'menu.operateur_dominant' => "Opérateur dominant",
          
            
      
 
            'system.demande_operateur' => "Opérateur (Orange/Yas/Expresso) : ",
            'system.demande_matricule' => "Matricule : ",
            'system.demande_numero' => "Numéro : ",
            'system.demande_nom' => "Nom : ",
            'system.demande_prenom' => "Prénom : ",
            
          
            'view.titre_ajout_client' => "Nouveau Client",
            'view.titre_liste_clients' => "Liste des Clients",
            'view.titre_ajout_numero' => "Nouveau Numéro",
            'view.entete_matricule' => "Matricule",
            'view.entete_nom' => "Nom",
            'view.entete_prenom' => "Prénom",
            'view.entete_numero' => "Numéro",
            'view.entete_operateur' => "Opérateur",
            
            
            'confirm.client_ajoute' => "Client ajouté avec succès !",
            'confirm.numero_ajoute' => "Numéro ajouté avec succès !",


         
            'view.titre_application' => "Gestion Clients et Numéros",
         
        ];

        return $texts[$this->value] ?? '';
    }

    public static function menuItems(): array {
        return array_map(fn($case) => $case->text(), [
            self::MENU_AJOUTER_CLIENT,
            self::MENU_LISTER_CLIENTS,
            self::MENU_AJOUTER_NUMERO,
            self::MENU_DASHBOARD,
            self::SYSTEM_DEMANDE_MATRICULE,
            self::MENU_LISTER_NUMEROS,
            self::MENU_FILTRER_OPERATEUR,
            self::MENU_CLIENT_PLUS_NUMEROS,
            self::MENU_OPERATEUR_DOMINANT,
            self::MENU_QUITTER
        ]);
    }
}
package com.example.user_panel;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;

public class login_panelController {

    String user_name_database = "lajos";//belépési adathoz szükséges
    String user_pass_database = "1234";//belépési adathoz szükséges

    String user_name;//később megadott felhasználó vagy jelszó
    String user_pass;//később megadott felhasználó vagy jelszó

    double szam1;
    double szam2;
    double osszeadva;
    double kivonva;
    double szorozva;
    double osztva;


    //meghívjuk az FXML ben lévő szükséges dolgokat
    //login panel része
    @FXML
    private Pane login_pane;
    @FXML
    private Button login_button;
    @FXML
    private TextField usr_name;
    @FXML
    private PasswordField usr_pass;
    @FXML
    private Label login_ertek;

    //választási felület
    @FXML
    private Pane userif_pane;

    //4 alap művelet
    @FXML
    private  Pane calc_pane;
    @FXML
    private TextField szam1_TF;
    @FXML
    private TextField szam2_TF;
    @FXML
    private Label osszeadva_label;
    @FXML
    private Label kivonva_label;
    @FXML
    private Label szorozva_label;
    @FXML
    private Label osztva_label;
    @FXML
    private Button szamolas_button;
    @FXML
    private Button calc_back_button_action;



    @FXML
    private void login_button_action(ActionEvent event){//Bejelentkezés gomb részletesen dokumentál konzolon nekünk és megvizsgálja a jelszót és felhasználót hogy helyesek e
        System.out.println("login_button lenyomva");

        user_name = "Felhasználó név";
        user_pass = "Jelszó";

        user_name = new String(usr_name.getText());
        user_pass = new String(usr_pass.getText());
        System.out.println(user_name);
        System.out.println(user_pass);


        if ((user_name.equals("")) || (user_pass.equals("")) ){//ha nincs be vitt adat akkor kiírja a következőt
            login_ertek.setText("Nem jól megadott adatok!");
            System.out.println("Nem jól megadott adatok!");
        }else if (user_name.equals(user_name_database) && user_pass.equals(user_pass_database)){//ha egyeznek sikeresen be jelentkezik és megjelenik a userif_pane
            login_ertek.setText("Sikeresen be jelentkeztél!");
            System.out.println("Sikeresen be jelentkeztél!");
            login_pane.setVisible(false);
            userif_pane.setVisible(true);
        }else if((user_name != user_name_database) && (user_pass != user_pass_database)){//ha nem egyezik akkor sikertelennek bizonyosul a belépés
            login_ertek.setText("Sikertelen bejelentkezés.");
            System.out.println("Sikertelen bejelentkezés.");
        }

    }

    @FXML
    private void calc_button(ActionEvent event){
        System.out.println("calc_button lenyomva");

        userif_pane.setVisible(false);//eltünteti a válsztó fület
        calc_pane.setVisible(true);//megjeleniti a calculatort ami a 4 alapműveletet végzi el

    }

    @FXML
    private void szamolas_button(ActionEvent event){
        System.out.println("szamolas_button lenyomva");

        szam1 = Double.parseDouble(szam1_TF.getText());//eltárolja a beírt számot
        szam2 = Double.parseDouble(szam2_TF.getText());//eltárolja a beírt számot
        System.out.println(szam1 + "" + szam2);

        osszeadva = szam1 + szam2;//elvégzi a műveletet
        kivonva = szam1 - szam2;//elvégzi a műveletet
        szorozva = szam1 * szam2;//elvégzi a műveletet
        osztva = szam1 / szam2;//elvégzi a műveletet

        osszeadva_label.setText("" + osszeadva);//kiírja a labelre
        kivonva_label.setText("" + kivonva);//kiírja a labelre
        szorozva_label.setText("" + szorozva);//kiírja a labelre
        osztva_label.setText("" + osztva);//kiírja a labelre

    }

    @FXML
    private void calc_back_button_action(ActionEvent event){//viassza lépteti a választási felületre
        calc_pane.setVisible(false);
        userif_pane.setVisible(true);
    }


}
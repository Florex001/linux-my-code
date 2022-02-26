package com.example.scene_proba;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;

public class calculateController {

    private double adottSz1;
    private double adottSz2;
    private double osszeadva;
    private double kivonva;
    private double szorozva;
    private double osztva;

    @FXML
    private Button szamolas_Button;
    @FXML
    private TextField elsoszam_textF;
    @FXML
    private TextField masodikszam_textF;
    @FXML
    private Label osszeadva_label;
    @FXML
    private Label kivonva_label;
    @FXML
    private Label szorozva_label;
    @FXML
    private Label osztva_label;
    @FXML
    private  Label hiba_label;

    @FXML
    private void szamolas_button(ActionEvent event) {
        System.out.println("szamolas_button lenyomva");
        System.out.printf("A megadott számok: %.2f %.2f \n", adottSz1, adottSz2);
        System.out.printf("A számok összeadva: %.2f \t kivonva: %.2f \t szorozva: %.2f \t osztva: %.2f \n", osszeadva, kivonva, szorozva, osztva);

        calculate();
    }

    private String calculate() {

        adottSz1 = 0;
        adottSz2 = 0;

        adottSz1 = Double.parseDouble(elsoszam_textF.getText());
        adottSz2 = Double.parseDouble(masodikszam_textF.getText());

        osszeadva = adottSz1 + adottSz2;
        kivonva = adottSz1 - adottSz2;
        szorozva =adottSz1 * adottSz2;
        osztva =adottSz1 / adottSz2;

        if(adottSz1 != 0 && adottSz2 != 0 ) {
            osszeadva_label.setText("" + osszeadva);
            kivonva_label.setText("" + kivonva);
            szorozva_label.setText("" + szorozva);
            osztva_label.setText("" + osztva);
        }else{
              hiba_label.setText("Nincs be vitt adat!");
              return "";
        }


        return "";



    }
}
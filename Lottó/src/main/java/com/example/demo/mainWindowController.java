package com.example.demo;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;

import java.io.PipedOutputStream;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Set;

public class mainWindowController {

    private final int MAX = 99;
    private final int MIN = 1;

    private int genNum1;
    private int genNum2;
    private int genNum3;
    private int genNum4;
    private int genNum5;

    private int selNum1;
    private int selNum2;
    private int selNum3;
    private int selNum4;
    private int selNum5;



    @FXML
    private Pane basePane;
    @FXML
    private Pane alertPane;
    @FXML
    private Button alertButton;

    @FXML
    private Label alertText;
    @FXML
    private Label label1;
    @FXML
    private Label label2;
    @FXML
    private Label label3;
    @FXML
    private Label label4;
    @FXML
    private Label label5;
    @FXML
    private Label eredmeny;

    @FXML
    private TextField beker1;
    @FXML
    private TextField beker2;
    @FXML
    private TextField beker3;
    @FXML
    private TextField beker4;
    @FXML
    private TextField beker5;


    @FXML
    private void alertButton(ActionEvent event){
        System.out.println("AalertButton lenyomva");
        basePane.setDisable(false);
        basePane.setOpacity(1);
        alertPane.setVisible(false);
        alertText.setText("");
    }

    @FXML
    private void sorsolas_button(ActionEvent event){
        System.out.println("sorsolas_button lenyomva");//konzolon kiírom a sorsolas buttont hogyha az meg van nyomva


        System.out.printf("A felhasználó által megadott számok: %d %d %d %d %d \n", selNum1 , selNum2 , selNum3 , selNum4 , selNum5);//konzolon kiírom a megadott számokat

        //genNumx változók alap érték beállítása 0-ra
        genNum1 = 0;
        genNum2 = 0;
        genNum3 = 0;
        genNum4 = 0;
        genNum5 = 0;

        //genNumx változók meg kapják a generált lottó számokat 1 és 99 között
        genNum1 = generaltLottoszam();
        genNum2 = generaltLottoszam();
        genNum3 = generaltLottoszam();
        genNum4 = generaltLottoszam();
        genNum5 = generaltLottoszam();

        //labelx be kíírjuk a genNumx be tárolt számokat
        label1.setText("" + genNum1);
        label2.setText("" + genNum2);
        label3.setText("" + genNum3);
        label4.setText("" + genNum4);
        label5.setText("" + genNum5);

        calculate();
    }

    private String calculate(){ //calculate fügvénybe bekérem azokat a számokat amiket a textfieldbe be visz a felhasználó
        try {
            //text_fieldbe a felhasználó által megadott számok tárolása a selNumx változókban
            selNum1 = Integer.parseInt(beker1.getText());
            selNum2 = Integer.parseInt(beker2.getText());
            selNum3 = Integer.parseInt(beker3.getText());
            selNum4 = Integer.parseInt(beker4.getText());
            selNum5 = Integer.parseInt(beker5.getText());
        }catch (Exception e){//megvizsgálom a bevitt adatot és ha az rossz akkor alertet kap a felhasználó
            alert("Hiányos vagy rossz be vitt adat!");//meghívjuk az alert osztályt és a megjelenő üzenetet
            return "";//returnoljuk a semmivel ezért el fogja különiteni az if ben vizsgált adatokat és az itt lévőket is
        }

        if ((selNum1 < 1 || selNum1 > 99 ) || (selNum2 <1 || selNum2 > 99 ) || (selNum3 <1 || selNum3 > 99 ) || (selNum1 <1 || selNum4 > 99 ) || (selNum5 <1 || selNum5 > 99 )){//végig vizsgál minden számot milyn intervalumba van
            alert("A számnak 1 és 99 között kell lennie!");//meghívjuk az alert osztályt és a megjelenő üzenetet
            return "";
        }

        Set<Integer> selectedNumbers = new HashSet<>();
        selectedNumbers.add(selNum1);
        selectedNumbers.add(selNum2);
        selectedNumbers.add(selNum3);
        selectedNumbers.add(selNum4);
        selectedNumbers.add(selNum5);

        if (selectedNumbers.size() < 5){
            alert("A számoknak különbözőnek kell lennie!");//meghívjuk az alert osztályt és a megjelenő üzenetet
        }

        ArrayList<Integer> usersNumbers = new ArrayList<>(selectedNumbers);

        int result =0;
        for(int i =0; i<usersNumbers.size(); i++){
            if (usersNumbers.get(i) == genNum1 || usersNumbers.get(i) == genNum2 || usersNumbers.get(i) == genNum3 || usersNumbers.get(i) == genNum4 || usersNumbers.get(i) == genNum5){
                result ++;
            }
        }

        switch (result){
            case 0 : eredmeny.setText("Sajnos nem nyertél!");
                    break;
            case 1 : eredmeny.setText("1 találatod lett!");
                break;
            case 2 : eredmeny.setText("2 találatod lett!");
                break;
            case 3 : eredmeny.setText("3 találatod lett!");
                break;
            case 4 : eredmeny.setText("4 találatod lett!");
                break;
            case 5 : eredmeny.setText("5 találatod lett!");
                break;
        }

        return "";//majd ezt mindegyikkel megvizsgáltatom
    }

    private void alert(String text){//alert osztályban adjuk meg az alert paneban megjelenő szöveget és különböző folyamatokat
        basePane.setDisable(true);
        basePane.setOpacity(0.3);
        System.out.println(text);
        alertPane.setVisible(true);
        alertText.setText(text);
    }

    private int generaltLottoszam(){
        //random számot generál
        int random = (int) (Math.random() * MAX + MIN);

        //megvizsgálja hogy a genNumx változóba tárolt számok nem e egyenlőek e egmyással és ha egyenlőek ujra futtatja a fügvényt
        if ((random == genNum1) || (random == genNum2) || (random == genNum3) || (random == genNum4) || (random == genNum5)){
            return generaltLottoszam();
        }

        return random;
    }

    public void EXIT_button(){
        System.out.println("EXIT_button megnyomva");
        System.exit(0);
    }
}
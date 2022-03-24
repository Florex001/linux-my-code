package com.example.iskolai_feladat;

import javafx.event.Event;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Dimension2D;
import javafx.geometry.Rectangle2D;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ToolBar;
import javafx.scene.control.Tooltip;
import javafx.scene.control.skin.ToolBarSkin;
import javafx.scene.control.skin.TooltipSkin;
import javafx.scene.shape.Rectangle;
import javafx.stage.Modality;
import javafx.stage.Screen;
import javafx.stage.Stage;

import java.io.IOException;
import java.util.TooManyListenersException;
import java.util.spi.ToolProvider;

public class Fo_Ablak_Controller {

    @FXML
    private Button keszítette_BTN;
    @FXML
    private Button kozep_BTN;
    @FXML
    private Button bal_felso_BTN;
    @FXML
    private Button jobb_felso_BTN;
    @FXML
    private Button bal_also_BTN;
    @FXML
    private Button jobb_also_BTN;

    @FXML
    public void keszitette_BTN() throws IOException {
        System.out.println("keszitette_BTN lenyomva");

        FXMLLoader fxmlLoader1 = new FXMLLoader(HelloApplication.class.getResource("Keszitette_Ablak_view.fxml"));
        Scene scene1 = new Scene(fxmlLoader1.load(), 300, 300);
        Stage stage1 = new Stage();
        stage1.setResizable(false);
        stage1.setTitle("Hello Sanyibá");
        stage1.initModality(Modality.WINDOW_MODAL);
        stage1.initOwner(HelloApplication.foAblak);
        HelloApplication.foAblak.setOpacity(0.9);
        stage1.setScene(scene1);
        stage1.show();
    }

    @FXML
    private void kozep_BTN(Event event){
        System.out.println("kozep_BTN lenyomva");

        Rectangle2D screenBounds = Screen. getPrimary(). getBounds();
        System. out. println("Height: " + screenBounds. getHeight() + " Width: " + screenBounds. getWidth());

        HelloApplication.foAblak.setX(screenBounds. getWidth() /2 -250);
        HelloApplication.foAblak.setY(screenBounds. getHeight() / 2 - 250);



    }

    @FXML
    private void bal_felso_BTN(Event event){
        System.out.println("bal_felso_BTN lenyomva");

        HelloApplication.foAblak.setX(5);
        HelloApplication.foAblak.setY(5);

    }

    @FXML
    private void jobb_felso_BTN(Event event){
        System.out.println("jobb_felso_BTN lenyomva");

        Rectangle2D screenBounds = Screen. getPrimary(). getBounds();

        HelloApplication.foAblak.setX(screenBounds. getWidth() -5 -500);
        HelloApplication.foAblak.setY(0);
    }

    @FXML
    private void bal_also_BTN(Event event){
        System.out.println("bal_also_BTN lenyomva");

        Rectangle2D screenBounds = Screen. getPrimary(). getBounds();

        HelloApplication.foAblak.setX(0);
        HelloApplication.foAblak.setY(screenBounds.getHeight() -575);

    }

    @FXML
    private void jobb_also_BTN(Event event){
        System.out.println("jobb_also_BTN lenyomva");

        Rectangle2D screenBounds = Screen. getPrimary(). getBounds();

        HelloApplication.foAblak.setX(screenBounds.getWidth() -5 -500);
        HelloApplication.foAblak.setY(screenBounds.getHeight() -575);
    }


}
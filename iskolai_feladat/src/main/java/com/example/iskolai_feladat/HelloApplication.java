package com.example.iskolai_feladat;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.stage.StageStyle;

import java.io.IOException;

public class HelloApplication extends Application {
    public static Stage foAblak;

    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(HelloApplication.class.getResource("Fo_Ablak_view.fxml"));
        Scene scene = new Scene(fxmlLoader.load(), 500, 500);
        foAblak = stage;
        stage.setResizable(false);
        stage.initStyle(StageStyle.UTILITY);
        stage.setTitle("Hello Sanyibá");
        stage.setScene(scene);
        stage.show();
        System.out.println(HelloApplication.foAblak.getX());
        System.out.println(HelloApplication.foAblak.getY());
    }

    public static void main(String[] args) {
        launch();
    }
}
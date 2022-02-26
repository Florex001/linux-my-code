module com.example.scene_proba {
    requires javafx.controls;
    requires javafx.fxml;


    opens com.example.scene_proba to javafx.fxml;
    exports com.example.scene_proba;
}
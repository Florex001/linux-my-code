module com.example.user_panel {
    requires javafx.controls;
    requires javafx.fxml;


    opens com.example.user_panel to javafx.fxml;
    exports com.example.user_panel;
}
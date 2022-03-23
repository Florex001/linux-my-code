module com.example.iskolai_feladat {
    requires javafx.controls;
    requires javafx.fxml;


    opens com.example.iskolai_feladat to javafx.fxml;
    exports com.example.iskolai_feladat;
}
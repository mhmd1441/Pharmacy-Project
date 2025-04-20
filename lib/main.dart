import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:pharmacies_zone/Routes/AppPage.dart';
import 'package:pharmacies_zone/Routes/AppRoute.dart';

import 'package:pharmacies_zone/Views/Slide5.dart';

void main() {
  runApp(const MyApp());
  // Uncomment the line below if you prefer to disable CanvasKit and use the default HTML renderer.
  // flutterWebRenderer: Surface
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return GetMaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      initialRoute:AppRoute.slide5,
      getPages: AppPage.pages,
      home: Slide5(),
    );
  }
}



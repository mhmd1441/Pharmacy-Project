import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide4Controller.dart';

class Slide4Binding extends Bindings{
  @override
  void dependencies() {
    // TODO: implement dependencies
    Get.lazyPut(()=>Slide4Controller());
  }


  }


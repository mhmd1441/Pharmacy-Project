
import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide3Controller.dart';

class Slide3Binding extends Bindings{
  @override
  void dependencies() {
    // TODO: implement dependencies
    Get.lazyPut(()=>Slide3Controller());
  }

}
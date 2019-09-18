<template>
  <div>
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title">
          <i class="fa fa-calendar"></i> เพิ่มงาน
        </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <form onsubmit="return false">
              <label>รายละเอียดตำแหน่ง</label>
              <div v-for="(item, index) in arr_positions">
                <div style="background-color: #ecf0f5; border-radius: 5px; padding: 10px;">
                  <button
                    @click="remove_position(index)"
                    type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
                  >×</button>
                  <span class="help-block">
                    <b>ตำแหน่ง :</b>
                    {{item.position}}
                  </span>
                  <span class="help-block">
                    <b>จำนวน :</b>
                    {{item.amount}}
                  </span>
                  <span class="help-block">
                    <b>รายละเอียดคุณวุฒิ :</b>
                    {{item.detail}}
                  </span>
                  <span class="help-block">
                    <b>เงินเดือน :</b>
                    {{item.salary}}
                  </span>
                </div>
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">ตำแหน่ง</span>
                <input
                  @click="setDate()"
                  required
                  autocomplete="off"
                  v-model="positions.position"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="ตำแหน่ง"
                />
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">จำนวน</span>
                <input
                  @click="setDate()"
                  required
                  autocomplete="off"
                  v-model="positions.amount"
                  type="text"
                  class="form-control"
                  id="amount"
                  placeholder="จำนวน"
                />
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">รายละเอียดคุณวุฒิ</span>
                <input
                  @click="setDate()"
                  required
                  autocomplete="off"
                  v-model="positions.detail"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="รายละเอียดคุณวุฒิ"
                />
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">เงินเดือน</span>
                <input
                  @click="setDate()"
                  required
                  autocomplete="off"
                  v-model="positions.salary"
                  type="number"
                  class="form-control"
                  id="address"
                  placeholder="เงินเดือน"
                />
              </div>
              <button
                type="submit"
                @click="add_positions()"
                class="btn btn-block btn-warning"
              >เพิ่มตำแหน่ง</button>
            </form>
          </div>
          <div class="col-md-6">
            <form onsubmit="return false">
              <div class="form-group">
                <label>รายละเอียดการรับสมัครงาน</label>
                <br />
                <span for="exampleInputEmail1">จังหวัด</span>
                <select
                  required
                  v-model="select_province"
                  class="form-control"
                  @change="add_province()"
                  @click="setDate()"
                >
                  <option value selected="selected">เลือกจังหวัด</option>
                  <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                  <option value="กระบี่">กระบี่</option>
                  <option value="กาญจนบุรี">กาญจนบุรี</option>
                  <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                  <option value="กำแพงเพชร">กำแพงเพชร</option>
                  <option value="ขอนแก่น">ขอนแก่น</option>
                  <option value="จันทบุรี">จันทบุรี</option>
                  <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
                  <option value="ชัยนาท">ชัยนาท</option>
                  <option value="ชัยภูมิ">ชัยภูมิ</option>
                  <option value="ชุมพร">ชุมพร</option>
                  <option value="ชลบุรี">ชลบุรี</option>
                  <option value="เชียงใหม่">เชียงใหม่</option>
                  <option value="เชียงราย">เชียงราย</option>
                  <option value="ตรัง">ตรัง</option>
                  <option value="ตราด">ตราด</option>
                  <option value="ตาก">ตาก</option>
                  <option value="นครนายก">นครนายก</option>
                  <option value="นครปฐม">นครปฐม</option>
                  <option value="นครพนม">นครพนม</option>
                  <option value="นครราชสีมา">นครราชสีมา</option>
                  <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
                  <option value="นครสวรรค์">นครสวรรค์</option>
                  <option value="นราธิวาส">นราธิวาส</option>
                  <option value="น่าน">น่าน</option>
                  <option value="นนทบุรี">นนทบุรี</option>
                  <option value="บึงกาฬ">บึงกาฬ</option>
                  <option value="บุรีรัมย์">บุรีรัมย์</option>
                  <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                  <option value="ปทุมธานี">ปทุมธานี</option>
                  <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                  <option value="ปัตตานี">ปัตตานี</option>
                  <option value="พะเยา">พะเยา</option>
                  <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
                  <option value="พังงา">พังงา</option>
                  <option value="พิจิตร">พิจิตร</option>
                  <option value="พิษณุโลก">พิษณุโลก</option>
                  <option value="เพชรบุรี">เพชรบุรี</option>
                  <option value="เพชรบูรณ์">เพชรบูรณ์</option>
                  <option value="แพร่">แพร่</option>
                  <option value="พัทลุง">พัทลุง</option>
                  <option value="ภูเก็ต">ภูเก็ต</option>
                  <option value="มหาสารคาม">มหาสารคาม</option>
                  <option value="มุกดาหาร">มุกดาหาร</option>
                  <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                  <option value="ยโสธร">ยโสธร</option>
                  <option value="ยะลา">ยะลา</option>
                  <option value="ร้อยเอ็ด">ร้อยเอ็ด</option
                  <option value="ระนอง">ระนอง</option>
                  <option value="ระยอง">ระยอง</option>
                  <option value="ราชบุรี">ราชบุรี</option>
                  <option value="ลพบุรี">ลพบุรี</option>
                  <option value="ลำปาง">ลำปาง</option>
                  <option value="ลำพูน">ลำพูน</option>
                  <option value="เลย">เลย</option>
                  <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                  <option value="สกลนคร">สกลนคร</option>
                  <option value="สงขลา">สงขลา</option>
                  <option value="สมุทรสาคร">สมุทรสาคร</option>
                  <option value="สมุทรปราการ">สมุทรปราการ</option>
                  <option value="สมุทรสงคราม">สมุทรสงคราม</option>
                  <option value="สระแก้ว">สระแก้ว</option>
                  <option value="สระบุรี">สระบุรี</option>
                  <option value="สิงห์บุรี">สิงห์บุรี</option>
                  <option value="สุโขทัย">สุโขทัย</option>
                  <option value="สุพรรณบุรี">สุพรรณบุรี</option>
                  <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
                  <option value="สุรินทร์">สุรินทร์</option>
                  <option value="สตูล">สตูล</option>
                  <option value="หนองคาย">หนองคาย</option>
                  <option value="หนองบัวลำภู">หนองบัวลำภู</option>
                  <option value="อำนาจเจริญ">อำนาจเจริญ</option>
                  <option value="อุดรธานี">อุดรธานี</option>
                  <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                  <option value="อุทัยธานี">อุทัยธานี</option>
                  <option value="อุบลราชธานี">อุบลราชธานี</option>
                  <option value="อ่างทอง">อ่างทอง</option>
                  <option value="อื่นๆ">อื่นๆ</option>
                </select>
                <div class="content-div">
                  <span
                    style="margin-right: 10px; cursor: pointer"
                    v-for="(item, index) in province"
                    class="label label-primary"
                    @click="remove_province(index)"
                    v-bind:key="item"
                  >
                    {{item}}
                    <i class="fa fa-close"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">ภาค</span>
                <select
                  required
                  v-model="select_region"
                  class="form-control"
                  @change="add_region()"
                  @click="setDate()"
                >
                  <option value selected="selected">เลือก</option>
                  <option>เหนือ</option>
                  <option>กลาง</option>
                  <option>ไต้</option>
                  <option>อีสาน</option>
                  <option>ปริมณฑล</option>
                </select>
                <div class="content-div">
                  <span
                    style="margin-right: 5px; cursor: pointer"
                    v-for="(item, index) in region"
                    class="label label-primary"
                    @click="remove_region(index)"
                    v-bind:key="item"
                  >
                    {{item}}
                    <i class="fa fa-close"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">หัวข้อ</span>
                <input
                  @click="setDate()"
                  required
                  v-model="work.topic"
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="topic"
                  placeholder="หัวข้อ"
                />
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">รายละเอียดการรับสมัคร</span>
                <input
                  @click="setDate()"
                  required
                  v-model="work.register_detail"
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="สถานที่รับสมัคร"
                />
              </div>
              <div class="row">
                <div class="col-md-6">
                  วันที่รับสมัคร
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input
                      @click="setDate()"
                      autocomplete="off"
                      v-model="work.start_date"
                      type="text"
                      class="form-control"
                      id="start_date"
                      data-provide="datepicker"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  ถึงวันที่
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input
                      @click="setDate()"
                      autocomplete="off"
                      v-model="work.finish_date"
                      type="text"
                      class="form-control"
                      id="finish_date"
                      data-provide="datepicker"
                    />
                  </div>
                </div>
              </div>
              <br />
              <div class="form-group">
                <span for="exampleInputEmail1">ลิงค์ประกาศรับสมัคร</span>
                <input
                  @click="setDate()"
                  v-model="work.announce"
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="ประกาศรับสมัคร"
                />
              </div>
              <div class="form-group">
                <span for="exampleInputEmail1">ลิงค์รับสมัคร</span>
                <input
                  @click="setDate()"
                  v-model="work.link"
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="ลิงค์รับสมัคร"
                />
              </div>
              <div style="display: none" id="warning" class="alert alert-warning alert-dismissible">
                <h4>
                  <i class="icon fa fa-warning"></i> Alert!
                </h4>
                <span>{{warning_text}}</span>
              </div>
              <button @click="save()" type="submit" class="btn btn-block btn-info">บันทึกรายการ</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="css">
.content-div {
  width: 100%;
  padding: 2px 5px;
  overflow: auto;
}

/* width */
::-webkit-scrollbar {
  width: 3px;
  height: 3px;
  border-radius: 25px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>

<script>
import { async } from "q";
$(".datepicker").datepicker();
</script>

<script>
export default {
  name: "add_work",
  data() {
    return {
      buff_arr_positions: [],
      arr_positions: [],
      positions: {
        position: "IT",
        amount: '1',
        detail: "computer",
        salary: "15000"
      },
      region: [],
      select_region: "",
      province: [],
      select_province: "",
      work: {
        topic: "",
        register_detail: "",
        start_date: "",
        finish_date: "",
        announce: "",
        link: ""
      },
      warning_text: ""
    };
  },
  methods: {
    add_region: function() {
      this.region.push(this.select_region);
    },
    remove_region: function(index) {
      this.region.splice(index, 1);
    },
    add_province: function() {
      this.province.push(this.select_province);
    },
    remove_province: function(index) {
      this.province.splice(index, 1);
    },
    setDefualtDate() {
      this.work.start_date = this.formatDate(new Date());
      this.work.finish_date = this.formatDate(new Date());
    },
    formatDate(date) {
      var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;

      return [year, month, day].join("-");
    },
    add_positions() {
      if (this.check_from_addposition()) {
        this.buff_arr_positions = this.positions;
        this.arr_positions.push({
          position: this.buff_arr_positions.position,
          amount: this.buff_arr_positions.amount,
          detail: this.buff_arr_positions.detail,
          salary: this.buff_arr_positions.salary
        });
      }

      this.positions = [];
    },
    remove_position(index) {
      this.arr_positions.splice(index, 1);
    },
    check_from_addposition() {
      if (this.positions.position == "") {
        return false;
      } else if (this.positions.detail == "") {
        return false;
      } else if (this.positions.salary == "") {
        return false;
      } else {
        return true;
      }
    },
    check_requrie_work() {
      if (this.province.length == 0) {
        return false;
      } else if (this.region.length == 0) {
        return false;
      } else if (this.work.register_detail == "") {
        return false;
      } else if (this.work.topic == "") {
        return false;
      } else if (this.arr_positions.length == 0) {
        document.getElementById("warning").style.display = "block";
        this.warning_text = "ยังไม่มีรายละเอียดตำแหน่ง";
        return false;
      } else {
        this.setDate();
        document.getElementById("warning").style.display = "none";
        return true;
      }
    },
    setDate() {
      this.work.start_date = document.getElementById("start_date").value;
      this.work.finish_date = document.getElementById("finish_date").value;
    },
    save: async function() {
      if (this.check_requrie_work()) {
        this.setDate();
        var self = this;
        var response = await axios
          .post("/addWork", {
            work: this.work,
            positions: this.arr_positions,
            province: this.province,
            region: this.region
          })
          .then(function(response) {
            if (response.data == "success") {
              Vue.notify({
                group: "foo",
                title: "สำเร็จ",
                text: "บันทึกการทำรายากร",
                type: "success"
              });
            }

            self.buff_arr_positions = [];
            self.arr_positions = [];
            self.positions = {
              position: "",
              amount: "",
              detail: "",
              salary: ""
            };
            self.salary = "";
            self.region = [];
            self.select_region = "";
            self.province = [];
            self.select_province = "";
            self.work = {
              topic: "",
              register_detail: "",
              start_date: "",
              finish_date: "",
              announce: "",
              link: ""
            };

            self.setDate();
          })
          .catch(function(error) {
            alert(error);
          });
      }
    }
  },
  created() {
    this.setDefualtDate();
  }
};
</script>
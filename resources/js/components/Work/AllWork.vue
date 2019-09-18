<template>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <i class="fa fa-newspaper-o"></i>
          <h3 class="box-title">งานที่เพิ่มใหม่</h3>
        </div>
        <!-- /.box-header -->
        <div class="row" style="padding-left: 10px; padding-right: 10px; margin-bottom: 10px;">
          <div class="col-md-4">
            วันที่รับเพิ่มงานลงระบบ
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input
                autocomplete="off"
                v-model="start_date"
                type="text"
                class="form-control"
                id="start_date"
                data-provide="datepicker"
              />
            </div>
          </div>
          <div class="col-md-4">
            ถึงวันที่
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input
                autocomplete="off"
                v-model="finish_date"
                type="text"
                class="form-control"
                id="finish_date"
                data-provide="datepicker"
              />
              <div class="input-group-addon">
                <a @click="searchByDate()">
                  <i class="fa fa-search"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            ค้นหาจากหัวข้อ
            <div class="input-group">
              <input v-model="search_topic" type="text" class="form-control" />
              <span class="input-group-addon">
                <a @click="searchByTopic()"><i class="fa fa-search"></i></a>
              </span>
            </div>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style="margin-bottom: 20px;">
            <tbody>
              <tr>
                <th>Action</th>
                <th>Order No.</th>
                <th>Work_ID</th>
                <th>Topic</th>
                <th>Detail</th>
                <th>Start</th>
                <th>Finish</th>
                <th>Status</th>
                <th>Region</th>
              </tr>
              <tr v-for="(item, index) in works">
                <td>
                  <div class="input-group-btn">
                    <button
                      style="border-radius: 30px; padding: 3px 6px;"
                      type="button"
                      class="btn dropdown-toggle"
                      data-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <span class="fa fa-gears"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a
                          style="color: #3c8dbc;"
                          id="detail"
                          href="#"
                          data-toggle="modal"
                          v-bind:data-target="'#' + index"
                        >
                          <i class="fa fa-file-pdf-o"></i> รายละเอียด
                        </a>
                      </li>
                      <li>
                        <router-link
                          :to="{ name: 'editwork', query: {works, provinces, regions, positions, index, page_name: 'allwork'} }"
                        >
                          <a href="/#/editwork">
                            <i class="fa fa-eyedropper"></i> แก้ไข
                          </a>
                        </router-link>
                      </li>
                      <li>
                        <a @click="func_delete(item.id)" href="#" style="color: #3c8dbc;">
                          <i class="fa fa-trash"></i> ลบ
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
                <td>{{index}}</td>
                <td>{{item.id}}</td>
                <td>{{item.topic}}</td>
                <td>{{item.register_detail}}</td>
                <td>{{item.start_date}}</td>
                <td>{{item.finish_date}}</td>
                <td>
                  <span v-if="item.status == 'new'" class="label label-danger">{{item.status}}</span>
                  <span v-if="item.status == 'posted'" class="label label-info">{{item.status}}</span>
                </td>
                <td>
                  <span v-for="region in regions[index]">{{region.region}}&nbsp;</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <section class="content" v-for="(item, index) in works">
        <div class="modal fade" v-bind:id="index">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">รายละเอียด</h4>
              </div>
              <div class="modal-body">
                <label style="color: green">รายละเอียดตำแหน่ง</label>
                <div v-for="(_position, position_index) in positions[index]">
                  <span>
                    {{position_index + 1}}. ตำแหน่ง :
                    <a>{{_position.position}}</a>
                  </span>
                  <br />
                  <span>
                    รายละเอียดคุณวุฒิ :
                    <a>{{_position.detail}}</a>
                  </span>
                  <br />
                  <span>
                    จำนวน :
                    <a>{{_position.amount}}</a>
                  </span>
                  <br />
                  <span>
                    เงินเดือน :
                    <a>{{_position.salary}}</a>
                  </span>
                </div>
                <br />
                <label style="color: green">รายละเอียดการรับสมัคร</label>
                <br />จังหวัด :
                <span v-for="(_province, province_index) in provinces[index]">
                  <a>{{_province.province}}&nbsp;</a>
                </span>
                <br />ภาค :
                <span v-for="(_region, region_index) in regions[index]">
                  <a>{{_region.region}}&nbsp;</a>
                </span>
                <br />
                <span>
                  หัวข้อการรับสมัคร :
                  <a>{{item.topic}}</a>
                </span>
                <br />
                <span>
                  รายละเอียดการรับสมัคร :
                  <a>{{item.register_detail}}</a>
                </span>
                <br />
                <span>
                  วันที่รับสมัคร :
                  <a>{{item.start_date}}</a>
                </span>
                <br />
                <span>
                  วันที่สิ้นสุดรับสมัคร :
                  <a>{{item.finish_date}}</a>
                </span>
                <br />
                <span v-if="item.announce">
                  ประกาศรับสมัคร :
                  <a>{{item.announce}}</a>
                </span>
                <br />
                <span v-if="item.link">
                  ลิ้งค์รับสมัคร :
                  <a>{{item.link}}</a>
                </span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  name: "allwork",
  data() {
    return {
      works: [],
      provinces: [],
      positions: [],
      regions: [],
      start_date: null,
      finish_date: null,
      search_topic: null,
    };
  },
  methods: {
    getWork() {
      var self = this;
      axios
        .get("/allwork")
        .then(function(response) {
          self.works = response.data;
          // console.log(self.works);
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getProvinces() {
      var self = this;
      axios
        .get("/getProvinces_all")
        .then(function(response) {
          self.provinces = response.data;
          // console.log(self.provinces);
        })
        .catch(function(error) {
          alert(error);
        });
    },

    getRegion() {
      var self = this;
      axios
        .get("/getRegion_all")
        .then(function(response) {
          self.regions = response.data;
          // console.log(self.regions);
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getPosition() {
      var self = this;
      axios
        .get("/getPosition_all")
        .then(function(response) {
          self.positions = response.data;
          // console.log(self.positions);
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getWrokByDate() {
      var self = this;
      self.start_date = document.getElementById("start_date").value;
      self.finish_date = document.getElementById("finish_date").value;
      axios
        .post("/getWrokByDate", {
          start_date: self.start_date,
          finish_date: self.finish_date
        })
        .then(function(response) {
          // console.log(response.data);
          self.works = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getProvincesByDate() {
      var self = this;
      self.start_date = document.getElementById("start_date").value;
      self.finish_date = document.getElementById("finish_date").value;
      axios
        .post("/getProvincesByDate", {
          start_date: self.start_date,
          finish_date: self.finish_date
        })
        .then(function(response) {
          // console.log(response.data);
          self.provinces = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getRegionsByDate() {
      var self = this;
      self.start_date = document.getElementById("start_date").value;
      self.finish_date = document.getElementById("finish_date").value;
      axios
        .post("/getRegionsByDate", {
          start_date: self.start_date,
          finish_date: self.finish_date
        })
        .then(function(response) {
          // console.log(response.data);
          self.regions = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getPositionsByDate() {
      var self = this;
      self.start_date = document.getElementById("start_date").value;
      self.finish_date = document.getElementById("finish_date").value;
      axios
        .post("/getPositionsByDate", {
          start_date: self.start_date,
          finish_date: self.finish_date
        })
        .then(function(response) {
          // console.log(response.data);
          self.positions = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    searchByDate(){
      this.getWrokByDate();
      this.getProvincesByDate();
      this.getRegionsByDate();
      this.getPositionsByDate();
    },
    getWrokByTopic() {
      var self = this;
      
      axios
        .post("/getWrokByTopic", {
          search_topic: self.search_topic
        })
        .then(function(response) {
          // console.log(response.data);
          self.works = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getProvincesByTopic() {
      var self = this;
      
      axios
        .post("/getProvincesByTopic", {
          search_topic: self.search_topic
        })
        .then(function(response) {
          // console.log(response.data);
          self.provinces = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getRegionsByTopic() {
      var self = this;
      
      axios
        .post("/getRegionsByTopic", {
          search_topic: self.search_topic
        })
        .then(function(response) {
          // console.log(response.data);
          self.regions = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getPositionsByTopic() {
      var self = this;

      axios
        .post("/getPositionsByTopic", {
          search_topic: self.search_topic
        })
        .then(function(response) {
          // console.log(response.data);
          self.positions = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    searchByTopic(){
      this.getWrokByTopic();
      this.getProvincesByTopic();
      this.getRegionsByTopic();
      this.getPositionsByTopic();
    },
    openmodal_detail(index) {
      var id = index;
      var backOfferButton = document.getElementById("detail");
      backOfferButton.dataset.target = "#" + id;
    },
    func_delete: async function(id) {
      var self = this;
      axios
        .post("/delete", {
          id: id
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

          self.getWork();
        })
        .catch(function(error) {
          alert(error);
        });
    },
    setDefualtDate() {
      this.start_date = this.formatDate(new Date());
      this.finish_date = this.formatDate(new Date());
    },
    formatDate(date) {
      var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;

      return [year, month, day].join("-");
    }
  },
  created() {
    this.getWork();
    this.getProvinces();
    this.getRegion();
    this.getPosition();
    this.setDefualtDate();
  }
};
</script>
<template>
  <div>
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title">
          <i class="fa fa-calendar"></i> ลิ้งค์หางานภาคอีสาน
        </h3>
      </div>
      <div class="box-body">
        <div class="row" style="padding-left: 10px; padding-right: 10px; margin-bottom: 10px;">
          <div class="col-md-4">
            <div class="form-group margin">
              <input v-model="name" type="text" class="form-control" placeholder="ชื่อหน่วยงาน" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-group margin">
              <input v-model="link" type="text" class="form-control" placeholder="Link" />
              <span class="input-group-btn">
                <button @click="addWorkLink()" type="button" class="btn btn-info btn-flat">บันทึก</button>
              </span>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>

        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style="margin-bottom: 20px;">
            <tbody>
              <tr>
                <th>Order No.</th>
                <th>Link_ID</th>
                <th>Name</th>
                <th>Link</th>
                <th>Region</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              <tr v-for="(item, index) in work_link">
                <td>{{index + 1}}</td>
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.link}}</td>
                <td>{{item.link_region}}</td>
                <td>
                  <span class="label label-info" v-if="item.status == 'check'">{{item.status}}</span>
                  <span class="label label-success" v-else>{{item.status}}</span>
                </td>
                <td>
                  <button
                    @click="setDataEdit(item)"
                    data-toggle="modal"
                    v-bind:data-target="'#' + index"
                    type="button"
                    class="btn btn-block btn-warning btn-xs"
                    style="width: fit-content"
                  >แก้ไข</button>
                </td>
                <td>
                  <button
                    @click="delete_link(item)"
                    type="button"
                    class="btn btn-block btn-danger btn-xs"
                    style="width: fit-content"
                  >ลบ</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <section class="content" v-for="(item, index) in work_link">
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
                  <label for="name">ชื่อหน่วยงาน</label>
                  <br />
                  <input
                    type="text"
                    class="form-control"
                    placeholder="ชื่อหน่วยงาน"
                    id="edit_name"
                    v-model="edit_name"
                  />
                  <label for="name">link</label>
                  <br />
                  <input
                    v-model="edit_link"
                    id="edit_link"
                    type="text"
                    class="form-control"
                    placeholder="link"
                  />
                  <label for="name">status</label>
                  <br />
                  <select
                    v-model="edit_status"
                    id="edit_status"
                    class="form-control"
                    v-if="item.status == 'check'"
                  >
                    <option value="check" selected>check</option>
                    <option value="checked">checked</option>
                  </select>
                  <select v-model="edit_status" id="edit_status" class="form-control" v-else>
                    <option value="check">check</option>
                    <option value="checked" selected>checked</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button
                    @click="save()"
                    type="button"
                    class="btn btn-info"
                    data-dismiss="modal"
                  >Save</button>
                </div>
              </div>
            </div>
          </div>
        </section>
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
import { stat } from "fs";
$(".datepicker").datepicker();
</script>

<script>
export default {
  name: "worklink_esan",
  data() {
    return {
      name: "หางานประเทศไทย",
      link: "www.google.com",
      work_link: "",
      edit_name: "",
      edit_link: "",
      edit_status: "",
      link_region: "",
      id: ""
    };
  },
  methods: {
    addWorkLink: async function() {
      var self = this;
      axios
        .post("/addWorkLink", {
          name: self.name,
          link: self.link,
          region: "ภาคอีสาน"
        })
        .then(function(response) {
          self.work_link = response.data;
          Vue.notify({
            group: "foo",
            title: "สำเร็จ",
            text: "บันทึกการทำรายากร",
            type: "success"
          });
          self.name = "";
          self.link = "";
        })
        .catch(function(error) {
          alert(error);
        });
    },
    getWorkLink: async function() {
      var self = this;
      axios
        .post("/getWorkLink", {
          region: "ภาคอีสาน"
        })
        .then(function(response) {
          self.work_link = response.data;
        })
        .catch(function(error) {
          alert(error);
        });
    },
    save() {
      console.log(this.name);
      var self = this;
      axios
        .post("/edit_work_link", {
          name: this.edit_name,
          link: this.edit_link,
          status: this.edit_status,
          id: this.id,
          link_region: this.link_region
        })
        .then(function(response) {
          self.work_link = response.data;

          Vue.notify({
            group: "foo",
            title: "สำเร็จ",
            text: "บันทึกการทำรายากร",
            type: "success"
          });
        })
        .catch(function(error) {
          alert(error);
        });
    },
    setDataEdit(item) {
      this.id = item.id;
      this.edit_name = item.name;
      this.edit_link = item.link;
      this.edit_status = item.status;
      this.link_region = item.link_region;
    },
    delete_link: async function(item) {
      var self = this;
      axios
        .post("/delete_link", {
          id: item.id,
          link_region: item.link_region,
        })
        .then(function(response) {
          self.work_link = response.data;
          Vue.notify({
            group: "foo",
            title: "สำเร็จ",
            text: "บันทึกการทำรายากร",
            type: "success"
          });
        })
        .catch(function(error) {
          alert(error);
        });
    }
  },
  created() {
    this.getWorkLink();
  }
};
</script>
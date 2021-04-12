<template>
    <div v-show="view_change">
        <div class="row p-0">
            <div class="col-4">
                <input
                    type="text"
                    class="form-control form-control-sm mb-2"
                    placeholder="Search..."
                />
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Fullname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, index) in employees" :key="index">
                            <td class="text-xs">{{ employee.employee_id }}</td>
                            <td
                                class="text-xs cursor-pointer"
                                @click="
                                    showOtherInformation(employee.employee_id)
                                "
                            >
                                {{ employee.lastname }} ,
                                {{ employee.firstname }}
                                {{ employee.middlename }}
                                {{ employee.extension }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-7">
                <div class="content">
                    <vue-tabs-chrome
                        ref="tab"
                        v-model="tab"
                        :tabs="tabs"
                        @dragstart="handleDragStart"
                        @dragging="handleDragging"
                        @dragend="handleDragEnd"
                        @swap="handleSwap"
                        @remove="handleRemove"
                        @contextmenu="handleRightClick"
                        @click="handleTabClick"
                    />
                    <div class="btns">
                        <button @click="addTab">New Tab</button>
                    </div>
                    <div>
                        <!-- {{ msgList }} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        view_change: {
            required: true
        }
    },
    data() {
        return {
            tab: "personal_info",
            tabs: [
                {
                    label: "Personal Information",
                    key: "personal_info"
                },
                {
                    label: "Family Background",
                    key: "family_background"
                },
                {
                    label: "Educational Background",
                    key: "educational_background"
                }
            ],
            msgList: [],
            employees: []
        };
    },
    methods: {
        showOtherInformation(employee_id) {
            this.$refs.tab.addTab();
        },
        addTab() {
            // let item = "tab" + Date.now();
            // let newTabs = [
            //     {
            //         label: "New Tab",
            //         key: item
            //     }
            // ];
            // this.$refs.tab.addTab(...newTabs);
            // this.tab = item;
        },
        handleDragStart(e, tab, index) {
            console.info("dragstart", e, tab, index);
            this.msgList.push("dragstart");
        },
        handleDragging(e, tab, index) {
            console.info("dragging", e, tab, index);
            this.msgList.push("dragging");
        },
        handleDragEnd(e, tab) {
            console.info("dragend", e, tab);
            this.msgList.push("dragend");
        },
        handleRemove(tab, index) {
            console.info("remove", tab, index);
            this.msgList.push("remove");
        },
        handleSwap(tab, targetTab) {
            console.info("swap", tab, targetTab);
            this.msgList.push("swap");
        },
        handleRightClick(e, tab, index) {
            console.info("contextmenu", e, tab, index);
            this.msgList.push("contextmenu");
        },
        handleTabClick(e, tab, index) {
            console.info(e, tab, index);
            this.msgList.push("click");
        }
    },
    created() {
        window.axios.get(`/api/employee/employees`).then(response => {
            if (response.status === 200) {
                this.employees = response.data.data;
            }
        });
    }
};
</script>
<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>

<template>
    <div v-show="view_change">
        <div class="row">
            <div class="col-3 mr-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-8 ">
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
                    label: "Educational Background",
                    key: "educational_background"
                }
            ],
            msgList: []
        };
    },
    methods: {
        addTab() {
            let item = "tab" + Date.now();
            let newTabs = [
                {
                    label: "New Tab",
                    key: item
                }
            ];
            this.$refs.tab.addTab(...newTabs);
            this.tab = item;
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
    }
};
</script>

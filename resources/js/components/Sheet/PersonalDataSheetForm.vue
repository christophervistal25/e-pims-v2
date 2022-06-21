<template>
    <div>
        <button
            class="btn btn-primary btn-block text-uppercase mb-3"
            @click="downloadPersonalDataSheet"
        >
            Download Personal Data Sheet
        </button>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item" v-for="(tab, key) in tabs" :key="key">
                    <a
                        href="javascript:;"
                        class="font-weight-bold text-uppercase"
                        :class="
                            selected_tab === tab.name
                                ? 'nav-link active'
                                : 'nav-link'
                        "
                        @click="open(tab.name)"
                    >
                        {{ tab.name }}
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <personal-information
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></personal-information>

                <family-background
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></family-background>

                <educational-background
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></educational-background>

                <!-- C2 -->
                <civil-service
                    :employeeID="id"
                    v-if="selected_tab === 'C2'"
                ></civil-service>

                <work-experience
                    :employeeID="id"
                    v-if="selected_tab === 'C2'"
                ></work-experience>
                <!-- END OF C2 -->

                <!-- C3 -->
                <voluntary-work
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></voluntary-work>

                <learning-and-development
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></learning-and-development>

                <other-information
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></other-information>
                <!-- END OF C3 -->

                <!-- BEGINNING OF C4 -->
                <relevant-queries
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></relevant-queries>

                <references-records
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></references-records>

                <government-issued-id
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></government-issued-id>
                <!-- END OF C4 -->
            </div>
        </div>

        <div
            class="modal fade bd-example-modal-lg show"
            id="selectFilExportModal"
            aria-labelledby="myLargeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title text-uppercase"
                            id="exampleModalLabel"
                        >
                            CHOOSE A FILE TYPE
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div
                                class="col-lg-6 p-2"
                                @click="downloadInExcel"
                                style="cursor: pointer"
                            >
                                <img
                                    class="img-fluid w-25"
                                    src="/assets/img/xls.png"
                                    alt=""
                                />
                                <span class="font-weight-medium"
                                    >DOWNLOAD IN EXCEL FORMAT</span
                                >
                            </div>
                            <div
                                class="col-lg-6 p-2"
                                @click="downloadInPdf"
                                style="cursor: pointer"
                            >
                                <img
                                    class="img-fluid w-25"
                                    src="/assets/img/pdf.png"
                                    alt=""
                                />
                                <span class="font-weight-medium"
                                    >DOWNLOAD IN PDF FORMAT</span
                                >
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            class="btn btn-block btn-primary"
                            id="btn-download-status"
                            v-show="spinnerShow"
                        >
                            <div
                                class="spinner-border text-light"
                                role="status"
                            ></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            spinnerShow: false,
            tabs: [
                {
                    name: "C1",
                },
                {
                    name: "C2",
                },
                {
                    name: "C3",
                },
                {
                    name: "C4",
                },
            ],
            selected_tab: "C1",
        };
    },
    methods: {
        open(tab) {
            this.selected_tab = tab;
            localStorage.setItem("current_tab", tab);
        },
        downloadPersonalDataSheet() {
            $("#selectFilExportModal").modal("toggle");
        },
        downloadInPdf() {
            this.spinnerShow = true;
            window.axios
                .post(
                    `/prints/download-personal-data-sheet/generate/${this.id}`
                )
                .then((response) => {
                    socket.emit("PRINT_PDF", {
                        id: this.id,
                        fileName: response.data.filename,
                    });
                });
        },
        downloadInExcel() {
            window.open(
                `/prints/download-personal-data-sheet-excel/${this.id}`
            );
            $("#selectFilExportModal").modal("toggle");
        },
    },
    created() {
        this.selected_tab = localStorage.getItem("current_tab") || "C1";
    },
};
</script>
<style scoped></style>

<template>
    <div>
        <div class="card-body rounded-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"
                                    ><img
                                        alt="No Image"
                                        src="/storage/employee_images/no_image.png"
                                /></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">
                                            {{ employee.fullname }}
                                        </h3>
                                        <h6 class="text-muted">
                                            {{ employee.information }}
                                        </h6>
                                        <small class="text-muted"
                                            >Web Designer</small
                                        >
                                        <div class="staff-id">
                                            Employee ID :
                                            {{ employee.employee_id }}
                                        </div>
                                        <div class="small doj text-muted">
                                            Date of Join :
                                            {{ employee.created_at }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">
                                                Phone:
                                            </div>
                                            <div class="text">
                                                <a href="">9876543210</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Email:
                                            </div>
                                            <div class="text">
                                                <a href=""
                                                    >johndoe@example.com</a
                                                >
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Birthday:
                                            </div>
                                            <div class="text">
                                                24th July
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Address:
                                            </div>
                                            <div class="text">
                                                1861 Bayonne Ave, Manchester
                                                Township, NJ, 08759
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Gender:
                                            </div>
                                            <div class="text">Male</div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Reports to:
                                            </div>
                                            <div class="text">
                                                <div class="avatar-box">
                                                    <div
                                                        class="avatar avatar-xs"
                                                    >
                                                        <img alt="" />
                                                    </div>
                                                </div>
                                                <a href="profile.html">
                                                    Jeffery Lalor
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pro-edit">
                            <a
                                data-target="#profile_info"
                                data-toggle="modal"
                                class="edit-icon"
                                href="#"
                                ><i class="fa fa-pencil"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true,
            type: Object
        }
    }
};
</script>

<style></style>

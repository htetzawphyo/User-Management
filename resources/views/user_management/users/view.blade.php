@extends('layouts.master')

    @section('content')
		<!--begin::Content wrapper-->
		<div class="d-flex flex-column flex-column-fluid">
			<!--begin::Toolbar-->
			<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
				<!--begin::Toolbar container-->
				<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
					<!--begin::Page title-->
					<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
						<!--begin::Title-->
						<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Documents</h1>
						<!--end::Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
							<!--begin::Item-->
							<li class="breadcrumb-item text-muted">
								<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
							</li>
							<!--end::Item-->
							<!--begin::Item-->
							<li class="breadcrumb-item">
								<span class="bullet bg-gray-400 w-5px h-2px"></span>
							</li>
							<!--end::Item-->
							<!--begin::Item-->
							<li class="breadcrumb-item text-muted">User Profile</li>
							<!--end::Item-->
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page title-->
					<!--begin::Actions-->
					<div class="d-flex align-items-center gap-2 gap-lg-3">
						<!--begin::Primary button-->
						<a href="{{ route('users') }}" class="btn btn-sm fw-bold btn-primary">
							<i class="fa-solid fa-backward"></i> Back
						</a>
						<span class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
							<i class="fa-solid fa-user-pen"></i>Edit
						</span>
						<!--end::Primary button-->
					</div>
					<!--end::Actions-->
				</div>
				<!--end::Toolbar container-->
			</div>
			<!--end::Toolbar-->
			<!--begin::Content-->
			<div id="kt_app_content" class="app-content flex-column-fluid">
				<!--begin::Content container-->
				<div id="kt_app_content_container" class="app-container container-xxl">
					<!--begin::Navbar == Customer Detail ==-->
					<div class="card mb-6">
						<div class="card-body pt-9 pb-0">
							<!--begin::Details-->
							<div class="d-flex flex-wrap flex-sm-nowrap justify-content-center">
								<!--begin: Pic-->
								<div class="me-7 mb-4 ">
									<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
										@if ($user->image)									
											<img src="{{ asset('storage/profile-image/'.$user->image->path) }}" alt="image" />													
										@else
											<div class="symbol-label fs-3 bg-light-primary text-primary">{{ substr($user->name,0,1) }}</div>
										@endif
									</div>
								</div>
								<!--end::Pic-->
								<!--begin::Info-->
								<div class="flex-grow-1">
									<!--begin::Title-->
									<div class="d-flex justify-content-start align-items-start flex-wrap mb-2">
										<!--begin::User-->
										<div class="d-flex flex-column">
											<!--begin::Name-->
											<div class="d-flex align-items-center mb-2">
												<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
											</div>
											<!--end::Name-->
											<!--begin::Info-->
											<div class="d-flex flex-wrap flex-column fw-semibold fs-6 mb-4 pe-2">
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
												<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
												<span class="svg-icon svg-icon-4 me-1  ">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
														<path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
														<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->{{ $user->roles->name }}</a>
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
												<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
												<span class="svg-icon svg-icon-4 me-1 ">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
														<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->{{ $user->phone }}</a>
												<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
												<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
												<span class="svg-icon svg-icon-4 me-1 ">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
														<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->{{ $user->email }}</a>
											</div>
											<!--end::Info-->
										</div>
										<!--end::User-->
									</div>
									<!--end::Title-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Details-->
							<!--begin::Navs-->
							<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
								<!--begin::Nav item-->
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../../demo1/dist/pages/user-profile/documents.html">Documents</a>
								</li>
								<!--end::Nav item-->
							</ul>
							<!--begin::Navs-->
						</div>
					</div>
					<!--end::Navbar-->
					<!--begin::Card == Customer Document == -->
					<div class="card card-flush">
						<!--begin::Card header-->
						<div class="card-header pt-8">
							<div class="card-title">
								<!--begin::Search-->
								<div class="d-flex align-items-center position-relative my-1">
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-1 position-absolute ms-6">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<form action="{{ route('users.edit', $user->id) }}" method="GET">
										@csrf
										<input type="text" name="doc_search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Files & Folders" />
									</form>
								</div>
								<!--end::Search-->
							</div>
							<!--begin::Card toolbar-->
							<div class="card-toolbar">
								<!--begin::Toolbar-->
								<div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
									<!--begin::Add customer-->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_upload">
									<!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
									<span class="svg-icon svg-icon-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
											<path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor" />
											<path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->Upload Files</button>
									<!--end::Add customer-->
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Card toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body">
							<!--begin::Table-->
							<div class="table-responsive">
								<table id="kt_file_manager_list" data-kt-filemanager-table="files" class="table align-middle table-row-dashed fs-6 gy-5">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
											<th class="min-w-250px">Name</th>
											<th class="min-w-250px">Type</th>
											<th class="min-w-10px">Size</th>
											<th class="min-w-125px">Last Modified</th>
											<th class="w-125px"></th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="fw-semibold text-gray-600">
										@if (count($documents) == 0)
                                            <tr class=" text-center">
                                                <td colspan="4" class=" text-muted">
                                                    There is no data to show
                                                </td>
                                            </tr>
                                        @endif
										@foreach ($documents as $document)											
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
														<span class="svg-icon svg-icon-2x svg-icon-primary me-4">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="currentColor" />
																<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<a href="#" class="text-gray-800 text-hover-primary">{{ $document->title }}</a>
													</div>
												</td>
												<!--end::Name=-->
												<!--begin::Type-->
												<td>{{ pathinfo($document->file_path, PATHINFO_EXTENSION) }}</td>
												<!--end::Type-->
												<!--begin::Size-->
												<td>{{ $document->size }}</td>
												<!--end::Size-->
												<!--begin::Last modified-->
												<td>{{ $document->updated_at->toDateString() }}</td>
												<!--end::Last modified-->
												<!--begin::Actions-->
												<td class="text-end" data-kt-filemanager-table="action_dropdown">
													<div class="d-flex justify-content-end">
														<!--begin::Share link-->
														{{-- <div class="ms-2" data-kt-filemanger-table="copy_link">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
																<span class="svg-icon svg-icon-5 m-0">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="currentColor" />
																		<path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</button>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px" data-kt-menu="true">
																<!--begin::Card-->
																<div class="card card-flush">
																	<div class="card-body p-5">
																		<!--begin::Loader-->
																		<div class="d-flex" data-kt-filemanger-table="copy_link_generator">
																			<!--begin::Spinner-->
																			<div class="me-5" data-kt-indicator="on">
																				<span class="indicator-progress">
																					<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
																				</span>
																			</div>
																			<!--end::Spinner-->
																			<!--begin::Label-->
																			<div class="fs-6 text-dark">Generating Share Link...</div>
																			<!--end::Label-->
																		</div>
																		<!--end::Loader-->
																		<!--begin::Link-->
																		<div class="d-flex flex-column text-start d-none" data-kt-filemanger-table="copy_link_result">
																			<div class="d-flex mb-3">
																				<!--begin::Svg Icon | path: icons/duotune/arrows/arr085.svg-->
																				<span class="svg-icon svg-icon-2 svg-icon-success me-3">
																					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																						<path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="currentColor" />
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																				<div class="fs-6 text-dark">Share Link Generated</div>
																			</div>
																			<input type="text" class="form-control form-control-sm" value="https://path/to/file/or/folder/" />
																			<div class="text-muted fw-normal mt-2 fs-8 px-3">Read only.
																			<a href="../../demo1/dist/apps/file-manager/settings/.html" class="ms-2">Change permissions</a></div>
																		</div>
																		<!--end::Link-->
																	</div>
																</div>
																<!--end::Card-->
															</div>
															<!--end::Menu-->
														</div> --}}
														<!--end::Share link-->
														<!--begin::More-->
														<div class="ms-2">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
																<!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
																<span class="svg-icon svg-icon-5 m-0">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
																		<rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</button>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
																<!--begin::Menu item-->
																{{-- <div class="menu-item px-3">
																	<a href="{{ asset('/storage/documents/'.$document->file_path) }}" class="menu-link px-3">Download File</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3" data-kt-filemanager-table="rename">Rename</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="#" class="menu-link px-3" data-kt-filemanager-table-filter="move_row" data-bs-toggle="modal" data-bs-target="#kt_modal_move_to_folder">Move to folder</a>
																</div> --}}
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<form action="{{ route('files.delete', $document->id) }}" method="POST">
																		@csrf
																		@method('DELETE')
																		<span class="menu-link text-danger px-3 delete-confirm" >Delete</span>
																	</form>
																</div>
																<!--end::Menu item-->
															</div>
															<!--end::Menu-->
														</div>
														<!--end::More-->
													</div>
												</td>
												<!--end::Actions-->
											</tr>
										@endforeach
										
									</tbody>
									<!--end::Table body-->
								</table>
							</div>
							<!--end::Table-->
							{{ $documents->withQueryString()->links() }}
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->

					<!--begin::Modals-->

					<!--begin::Modal - Upload File-->
					<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
						<!--begin::Modal dialog-->
						<div class="modal-dialog modal-dialog-centered mw-650px">
							<!--begin::Modal content-->
							<div class="modal-content">
								<!--begin::Form-->
								<form class="form" action="{{ route('files.store') }}" id="kt_modal_upload_form" method="POST" enctype="multipart/form-data">
									{{-- <form class="form" action="{{ route('files.store') }}" id="kt_modal_upload_form" method="POST" enctype="multipart/form-data"> --}}
									@csrf
									<input type="hidden" name="user_id" value="{{ $user->id }}">
									<!--begin::Modal header-->
									<div class="modal-header">
										<!--begin::Modal title-->
										<h2 class="fw-bold">Upload files</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-1">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body pt-10 pb-15 px-lg-17">
										<!--begin::Input group-->
										<div class="fv-row mb-7">                                    
											<label class="required fw-semibold fs-6 mb-2">Title</label>                                   
											<input type="text" name="doc_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" />
											@if ($errors->addDocument->has('doc_name'))
												<div class="text-danger my-2">{{ $errors->addDocument->first('doc_name') }}</div>
											@endif                  
										</div>
										<div class="mb-5">
											<label class="required fw-semibold fs-6 mb-2">File</label>
											<input type="file" class="form-control" name="doc_file">
										</div>
										@if ($errors->addDocument->has('doc_file'))
											<div class="text-danger my-2">{{ $errors->addDocument->first('doc_file') }}</div>
										@endif 
										<!--end::Input group-->
										<div class="form-text fs-6 text-muted mb-5">Max file size is 20MB per file.</div>
										<hr>
										<div class="mb-5">	
											<label class="fw-semibold fs-6 mb-2">Select Storage </label>									
											<h6 class="fs-7 text-muted">* Default - Digital Ocean Spaces Storage</h6>	
											<select class="form-select fs-7 w-200px" name="storage">
												<option value="1" class="form-select" selected>Digital Ocean Space</option>
												<option value="2" class="form-select">Local Storage</option>
											</select>
										</div>
									</div>
									<!--end::Modal body-->
									{{-- begin::Modal footer --}}
									<div class="modal-footer">
										<button class="btn btn-primary float-start" type="submit">Save</button>
									</div>
									{{-- end::Modal footer --}}
								</form>
								<!--end::Form-->
							</div>
						</div>
					</div>
					<!--end::Modal - Upload File-->

					<!--begin::Modal - Update user details-->
					<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
						<!--begin::Modal dialog-->
						<div class="modal-dialog modal-dialog-centered mw-650px">
							<!--begin::Modal content-->
							<div class="modal-content">
								<!--begin::Form-->
								<form class="form" action="{{ route('users.update', $user->id) }}" id="kt_modal_update_user_form" 
									method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_update_user_header">
										<!--begin::Modal title-->
										<h2 class="fw-bold">Update User Details</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
											<span class="svg-icon svg-icon-1">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
													<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Close-->
									</div>
									<!--end::Modal header-->
									<!--begin::Modal body-->
									<div class="modal-body py-10 px-lg-17">
										<!--begin::Scroll-->
										<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
											<!--begin::User toggle-->
											<div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">User Information
											<span class="ms-2 rotate-180">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-3">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span></div>
											<!--end::User toggle-->
											<!--begin::User form-->
											<div id="kt_modal_update_user_user_info" class="collapse show">
												<!--begin::Input group-->
												<div class="mb-7">
													<div class="mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-semibold mb-2">
															<span>Update Avatar</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
														</label>
														<!--end::Label-->
														<!--begin::Image input wrapper-->
														<div class="mt-1">
															<!--begin::Image placeholder-->
															<style>.image-input-placeholder { background-image: url('/assets/media/svg/avatars/blank.svg'); } [data-theme="dark"] .image-input-placeholder { background-image: url('/assets/media/svg/avatars/blank-dark.svg'); }</style>
															<!--end::Image placeholder-->
															<!--begin::Image input-->
															<div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
																<!--begin::Preview existing avatar-->
																@if ($user->image)																	
																	<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ '/storage/profile-image/'.$user->image->path }})"></div>
																@else
																	<div class="image-input-wrapper w-125px h-125px"></div>
																@endif
																<!--begin::Edit-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="avatar_remove" />
																	<!--end::Inputs-->
																</label>
																<!--end::Edit-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
														</div>
														<!--end::Image input wrapper-->
													</div>

												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold mb-2">Full Name</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" class="form-control form-control-solid" placeholder="" name="full_name" 
													value="{{ old('full_name', $user->name) }}" />
													@if ($errors->editUser->has('full_name'))
														<div class="text-danger my-2">{{ $errors->editUser->first('full_name') }}</div>
													@endif 
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold mb-2">User Name</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="text" class="form-control form-control-solid" placeholder="" name="user_name" 
													value="{{ old('user_name', $user->username) }}" />
													@if ($errors->editUser->has('user_name'))
														<div class="text-danger my-2">{{ $errors->editUser->first('user_name') }}</div>
													@endif 
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold mb-2">
														<span>Email</span>
														<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
													</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="email" class="form-control form-control-solid" placeholder="" name="email" 
													value="{{ old('email', $user->email) }}" />
													@if ($errors->editUser->has('email'))
														<div class="text-danger my-2">{{ $errors->editUser->first('email') }}</div>
													@endif 
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold mb-2">Phone</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="number" class="form-control form-control-solid" placeholder="" name="user_phone" 
													value="{{ old('user_phone', $user->phone) }}" />
													@if ($errors->editUser->has('user_phone'))
														<div class="text-danger my-2">{{ $errors->editUser->first('user_phone') }}</div>
													@endif 
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">
													<!--begin::Label-->
													<label class="fs-6 fw-semibold mb-2">Password</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input type="password" class="form-control form-control-solid" placeholder="" name="user_password" 
													value="" />
													@if ($errors->editUser->has('user_password'))
														<div class="text-danger my-2">{{ $errors->editUser->first('user_password') }}</div>
													@endif 
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">                                    
													<label class="required fw-semibold fs-6 mb-2">Gender</label>    
													<div class="d-flex">
														<!--begin::Radio-->
														<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
															<input class="form-check-input" type="radio" value="1" name="user_gender" 
															@checked($user->gender)/>
															<span class="form-check-label">Male</span>
														</label>
														<!--end::Radio-->
														<!--begin::Radio-->
														<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
															<input class="form-check-input" type="radio" value="0" name="user_gender" 
															@checked(!$user->gender)/>
															<span class="form-check-label">FeMale</span>
														</label>
														<!--end::Radio-->
													</div>  
													@if ($errors->editUser->has('user_gender'))
														<div class="text-danger my-2">{{ $errors->editUser->first('user_gender') }}</div>
													@endif                            --}}
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-7">                                    
													<label class="required fw-semibold fs-6 mb-2">Is Active</label>
													<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
														<input class="form-check-input" type="checkbox" value="{{ 'checked' ? 1 : 0 }}" name="active" 
														@checked($user->is_active)/>
														<span class="form-check-label">Is Active</span>
													</label>                                   
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="mb-7">
													<label class="required fw-semibold fs-6 mb-5">Role</label>
													@foreach ($roles as $role)
														<div class="d-flex fv-row">
															<div class="form-check form-check-custom form-check-solid">
																<input class="form-check-input me-3" name="user_role" type="radio" value="{{ $role->id }}" 
																@checked($user->role_id == $role->id)/>
																<label class="form-check-label" for="kt_modal_update_role_option_0">
																	<div class="fw-bold text-gray-800">{{ $role->name }}</div>
																</label>
															</div>
														</div>
														<div class='separator separator-dashed my-5'></div>
													@endforeach
													@if ($errors->editUser->has('user_role'))
														<div class="text-danger my-2">{{ $errors->editUser->first('user_role') }}</div>
													@endif 
												</div>
												<!--end::Input group-->
											</div>
											<!--end::User form-->
										</div>
										<!--end::Scroll-->
									</div>
									<!--end::Modal body-->
									<!--begin::Modal footer-->
									<div class="modal-footer flex-center">
										<!--begin::Button-->
										<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
										<!--end::Button-->
										<!--begin::Button-->
										<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
											<span class="indicator-label">Submit</span>
											{{-- <span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
										</button>
										<!--end::Button-->
									</div>
									<!--end::Modal footer-->
								</form>
								<!--end::Form-->
							</div>
						</div>
					</div>
					<!--end::Modal - Update user details-->

					<!--end::Modals-->
				</div>
				<!--end::Content container-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Content wrapper-->
	@endsection

	@push('child-scripts')
    <script>
        $('.delete-confirm').on('click', function(e) {
			e.preventDefault();
			let form = $(this).closest('form');
			Swal.fire({
				title: 'Are you sure?',
				text: "You want to delete it!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					form.submit();
				}
			});
		});

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toastr-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        "use strict";
        // Class definition
        var KTUsersUpdateDetails = function () {
            // Shared variables
            const element = document.getElementById('kt_modal_update_details');
            const form = element.querySelector('#kt_modal_update_user_form');
            const modal = new bootstrap.Modal(element);
			
            @if ($errors->editUser->any())
				Swal.fire({
					text: "Sorry, looks like there are some errors detected, please try again.",
					icon: "error",
					buttonsStyling: !1,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton:
							"btn btn-primary",
					},
				}).then(function (result) {
						if(result.isConfirmed){
							modal.show();
						}
                });;
            @endif
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			
            // Init add schedule modal
            var initUpdateDetails = () => {
				var validator = FormValidation.formValidation(
					form,
					{
						fields: {
							// full_name: {
							// 	validators: {
							// 		notEmpty: { message: "First name is required" },
							// 	},
							// },
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger(),
							bootstrap: new FormValidation.plugins.Bootstrap5({
								rowSelector: '.fv-row',
								eleInvalidClass: '',
								eleValidClass: ''
							})
						}
					}
				);
        
                // Close button handler
                const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
                closeButton.addEventListener('click', e => {
                    e.preventDefault();
        
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            form.reset(); // Reset form	
                            modal.hide(); // Hide modal				
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Your form has not been cancelled!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                        }
                    });
                });
        
                // Cancel button handler
                const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
                cancelButton.addEventListener('click', e => {
                    e.preventDefault();
        
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            form.reset(); // Reset form	
                            modal.hide(); // Hide modal				
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Your form has not been cancelled!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                        }
                    });
                });
            }
        
            return {
                // Public functions
                init: function () {
                    initUpdateDetails();
                }
            };
        }();

		var DocumentsUpload = function () {
			const element = document.getElementById('kt_modal_upload');
			const form = element.querySelector('#kt_modal_upload_form');
			const modal = new bootstrap.Modal(element);

			@if ($errors->addDocument->any())
				Swal.fire({
					text: "Sorry, looks like there are some errors detected, please try again.",
					icon: "error",
					buttonsStyling: !1,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton:
							"btn btn-primary",
					},
				}).then(function (result) {
						if(result.isConfirmed){
							modal.show();
						}
                });;
            @endif

			var initUpdateDetails = () => {
				var validator = FormValidation.formValidation(
					form,
					{
						fields: {
							doc_name: {
								validators: {
									notEmpty: { message: "First name is required" },
								},
							},
							doc_file: {
								validators: {
									notEmpty: { message: "First name is required" },
								},
							},
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger(),
							bootstrap: new FormValidation.plugins.Bootstrap5({
								rowSelector: '.fv-row',
								eleInvalidClass: '',
								eleValidClass: ''
							})
						}
					}
				);
            }
        
            return {
                // Public functions
                init: function () {
                    initUpdateDetails();
                }
            };
		}();
        
        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTUsersUpdateDetails.init();
			DocumentsUpload.init();
        });
    </script>
    @if (session('message'))
        <script>
            toastr.success("{{session('message')}}");
        </script>
    @endif
	@if (session('401message'))
		<script>
			toastr.warning("{{session('401message')}}");
		</script>
	@endif
    @endpush
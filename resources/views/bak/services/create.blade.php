@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: -90px;
  }
</style>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=AKsRIsq1Dnz1_KUQfXwV7gmGgdstoCxXZPUc49hKFg0yr2YC2-VTds9RcB7GQP3dRtTpJaVT87olOdW4UMukzUpmogigaIfn3W_5in0gxYEmmETsIJIegidKgo5vM-jTAqqkMQuSjgJMiVyreGW0MqtrP-VdJyUEZR2cOVcf0y2hH8ChzqoNqJY-5cYvX1NytjfpQmshQXy1bifSrEp_TcYPzSVTCZ8ZY4unoahK__wI69xhS7nWm2HsOIhTwIFZ1J5zzLWIxgdUP5piDcP5O0MG5oLouqXSIoPdfgEzkB2x4zKIBzAhnEY-CdmOIPs0Nq9KPlG4bkqrEb4Wt4uznmDWEqiOgqgMLGq5aDkyIYW4e2HeTlnIqs-WXsfA6XlHF_pDRUhowzxb-e0zM72pUT97nSSABzDhy-xv1SIRCNw" charset="UTF-8"></script></head>
<body>
    <!-- start of container -->
    <div class="container-fluid mt-5">
        <form method="POST" id="dynamic_form" action="{{ route('services.store') }}" enctype="multipart/form-data">
@csrf
            <!-- start of row -->
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <!-- start of card -->
                    <div class="card">
                        <div class="card-header">
                            Add Services
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                            @endif
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="from-group">
                                                <label for="division_id">Division:</label>
                                                <select name="division_id" id="division_id"  class="form-control @error('division_id') is-invalid @enderror" value="{{ old('division_id') }}">
                                                    <option selected disabled>--Select Division--</option>
                                                  @foreach ($divisions as $division)
                                                    <option value="{{$division->id }}">{{ $division->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="from-group">
                                                <label for="unit-owner">Unit owner:</label>
                                                <select name="unit_owner" id="unit_owner" class="form-control @error('unit_owner') is-invalid @enderror"  value="{{ old('unit_owner') }}">
                                                    <option selected disabled>--Select Unit--</option>

                                               </select>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="from-group">
                                                <label for="title">Title:</label>
                                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="from-group">
                                                <label for="description">Description:</label>
                                                <textarea name="description" id="description" class="form-control" value="{{ old('unit_owner') }}"> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="from-group">
                                        <label for="authorized">Additional Authorized Unit:</label>
                                        <select name="authorized" id="authorized" class="form-control"  value="{{ old('authorized') }}" multiple>
                                            <option value="mis">Test1</option>
                                            <option value="sya">Test2</option>
                                            <option value="lo">Test3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="attachment">Additional attachment</label>
                                        <input type="file" class="form-control-file form-control-sm" id="attachment"
                                               name="attachment">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="table-responsive">

                                        <!-- start of 1st parent table -->
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="25%">
                                                        Office or Division
                                                    </th>
                                                    <th width="75%">
                                                        <input type="text" name="office_division" class="form-control" value="{{ old('office_division') }}">
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Classification:
                                                    </td>
                                                    <td>
                                                        <textarea name="classification" id="classification" class="form-control"
                                                                  placeholder="Insert value here..." value="{{ old('classification') }}"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Type of Transaction:
                                                    </td>
                                                    <td>
                                                        <textarea name="transaction_type" id="type-transaction" class="form-control"
                                                               placeholder="Insert value here..." value="{{ old('transaction_type') }}"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Who may avail:
                                                    </td>
                                                    <td>
                                                        <textarea name="who_avail" id="who-avail" class="form-control"
                                                               placeholder="Insert value here..." value="{{ old('who_avail') }}"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" class="p-0">

                                                        <!-- start of sibling table -->
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th width="49%">
                                                                        CHECKLIST OF REQUIREMENTS
                                                                    </th>
                                                                    <th width="48%">
                                                                        WHERE TO SECURE
                                                                    </th>
                                                                    <th width="3%"></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="requirement-container">
                                                                <tr class="requirement-row-data">
                                                                    <td class="p-0">
                                                                        <textarea name="requirements[]" id="" rows="3" class="form-control"
                                                                                  placeholder="Insert value here..." value="{{ old('requirement[]') }}"></textarea>
                                                                    </td>
                                                                    <td class="p-0">
                                                                        <textarea name="where_secure[]" id="" rows="3" class="form-control"
                                                                                  placeholder="Insert value here..." value="{{ old('where_secure[]') }}"></textarea>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-danger btn-rounded text-white"
                                                                           onclick="$(this).deleteRow($(this), '.requirement-row-data');">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <tr class="add-requirement-container">
                                                                    <td colspan="2" class="p-0">
                                                                        <a class="btn btn-light btn-block"
                                                                           onclick="$(this).addRow('requirement', '#requirement-container');">
                                                                            <i class="fas fa-plus"></i> ADD ROW
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- end of sibling table -->

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end of 1st parent table -->

                                    </div>

                                    <div class="table-responsive">

                                        <!-- start of 2nd parent table -->
                                        <table class="table table-bordered">
                                            <tbody class="proc-container">
                                                <tr class="p-0 proc-row-data">
                                                    <td class="p-0">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th width="15%">
                                                                        PROCESS TITLE
                                                                    </th>
                                                                    <th width="82%">
                                                                        <input type="text" class="form-control" name="proc_title[]"  placeholder="Insert value here..." value="{{ old('proc_title[]') }}">
                                                                    </th>
                                                                    <th width="3%">
                                                                        <a class="btn btn-danger btn-rounded text-white"
                                                                           onclick="$(this).deleteRow($(this), '.proc-row-data');">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr class="proc-row-data">
                                                                    <td colspan="3" class="bg-secondary">
                                                                        <table class="table mb-0 bg-white">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center" width="10%">
                                                                                        CLIENT STEPS
                                                                                    </th>
                                                                                    <th class="text-center" width="30%">
                                                                                        AGENCY ACTION
                                                                                    </th>
                                                                                    <th class="text-center" width="15%">
                                                                                        FEES TO BE PAID
                                                                                    </th>
                                                                                    <th class="text-center" width="26%">
                                                                                        PROCESSING TIME
                                                                                    </th>
                                                                                    <th class="text-center" width="26%">
                                                                                        PERSON RESPOSIBLE
                                                                                    </th>
                                                                                    <th width="3%">

                                                                                    </th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody id="sub-proc-container-1" class="sub-proc-container">
                                                                                <tr class="sub-proc-row-data">
                                                                                    <td>
                                                                                        <textarea name="test[]" id="" rows="2" class="form-control"
                                                                                                placeholder="Insert value here..."></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea name="test[]" id="" rows="2" class="form-control"
                                                                                                placeholder="Insert value here..."></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number" class="form-control" name="test[]">
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea name="test[]" id="" rows="2" class="form-control"
                                                                                                placeholder="Insert value here..."></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea name="test[]" id="" rows="2" class="form-control"
                                                                                                placeholder="Insert value here..."></textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a class="btn btn-danger btn-rounded text-white"
                                                                                           onclick="$(this).deleteRow($(this), '.sub-proc-row-data');">
                                                                                            <i class="fas fa-trash"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="add-sub-proc-container">
                                                                                    <td colspan="6" class="p-0">
                                                                                        <a class="btn btn-light btn-block"
                                                                                           onclick="$(this).addRow('sub-process', '#sub-proc-container-1');">
                                                                                            <i class="fas fa-plus"></i> ADD ROW
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr class="add-proc-container">
                                                    <td colspan="3" class="p-0">
                                                        <a class="btn btn-light btn-block" onclick="$(this).addRow('process', '.proc-container');">
                                                            <i class="fas fa-plus"></i> ADD PROCESS
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end of 2nd parent table -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of card -->

                </div>
            </div>
            <!-- end of row -->
            <button type="submit" class="btn btn-primary">Add Citizens' Charter</button>
        </form>
    </div>
    <!-- end of container -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <script>
        $(function() {

            function addRowRequirement(containerID) {
                const row = `<tr class="requirement-row-data">
                                <td class="p-0">
                                    <textarea name="requirements[]" id="" rows="3" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td class="p-0">
                                    <textarea name="where_secure[]" id="" rows="3" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-rounded text-white"
                                    onclick="$(this).deleteRow($(this), '.requirement-row-data');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>`;

                $(containerID).find('tr.add-requirement-container').before(row);
            }

            function addRowSubProc(containerID) {
                const countRow = $('.sub-proc-row-data').length,
                      constainerID = `sub-proc-container-${countRow + 1}`;
                const row = `<tr class="sub-proc-row-data">
                                <td>
                                    <textarea name="test[]" rows="2" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td>
                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="test[]">
                                </td>
                                <td>
                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td>
                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                            placeholder="Insert value here..."></textarea>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-rounded text-white"
                                    onclick="$(this).deleteRow($(this), '.sub-proc-row-data');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>`;

                $(containerID).find(`tr.add-sub-proc-container`).before(row);
            }

            function addRowProc(containerID) {
                const subProcCount = $('.sub-proc-container').length;
                const row = `<tr class="p-0 proc-row-data">
                                <td class="p-0">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th width="15%">
                                                    PROCESS TITLE
                                                </th>
                                                <th width="82%">
                                                    <input type="text" class="form-control" name="test[]">
                                                </th>
                                                <th width="3%">
                                                    <a class="btn btn-danger btn-rounded text-white"
                                                    onclick="$(this).deleteRow($(this), '.proc-row-data');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="proc-row-data">
                                                <td colspan="3" class="bg-secondary">
                                                    <table class="table mb-0 bg-white">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" width="10%">
                                                                    CLIENT STEPS
                                                                </th>
                                                                <th class="text-center" width="30%">
                                                                    AGENCY ACTION
                                                                </th>
                                                                <th class="text-center" width="15%">
                                                                    FEES TO BE PAID
                                                                </th>
                                                                <th class="text-center" width="26%">
                                                                    PROCESSING TIME
                                                                </th>
                                                                <th class="text-center" width="26%">
                                                                    PERSON RESPOSIBLE
                                                                </th>
                                                                <th width="3%">

                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="sub-proc-container-${subProcCount + 1}" class="sub-proc-container">
                                                            <tr class="sub-proc-row-data">
                                                                <td>
                                                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                                                            placeholder="Insert value here..."></textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                                                            placeholder="Insert value here..."></textarea>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control" name="test[]">
                                                                </td>
                                                                <td>
                                                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                                                            placeholder="Insert value here..."></textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea name="test[]" id="" rows="2" class="form-control"
                                                                            placeholder="Insert value here..."></textarea>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-danger btn-rounded text-white"
                                                                    onclick="$(this).deleteRow($(this), '.sub-proc-row-data');">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <tr class="add-sub-proc-container">
                                                                <td colspan="6" class="p-0">
                                                                    <a class="btn btn-light btn-block"
                                                                       onclick="$(this).addRow('sub-process', '#sub-proc-container-${subProcCount + 1}');">
                                                                        <i class="fas fa-plus"></i> ADD ROW
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>`;

                $(containerID).find('tr.add-proc-container').before(row);
            }

            $.fn.addRow = function(toggle, element) {
                if (toggle == 'requirement') {
                    addRowRequirement(element);
                } else if (toggle == 'sub-process') {
                    addRowSubProc(element);
                } else if (toggle == 'process') {
                    addRowProc(element);
                }
            }

            $.fn.deleteRow = function(btnElem, rowDataClass) {
                const countElem = $(rowDataClass).length;

                if (confirm('Are you sure you want to delete this row?')) {
                    if (countElem > 1) {
                        $(btnElem).closest(rowDataClass).remove();
                    } else {
                        alert('There is only one row.');
                    }
                }
            }
        });

        const baseURL = "{{ url('/') }}/";

        $(document).ready(function(){
            $('#division_id').on('change',function() {
                const divisionID = $(this).val();
                      urlGetUnits = `${baseURL}/get-units/${divisionID}`;


                $.get(urlGetUnits, function(data){
                    $('#unit_owner').html('');
                    let optSelect = '<option value="" disabled> Select Unit</option>';
                    // $('#unit').html('');
                    $.each(data, function(ctr, dat) {
                        $('#unit_owner').append('<option value='+dat.id+'>'+dat.name+'</option>');
                        // const jsonData = $.parseJSON(dat);
                        // const unitID = jsonData .id,
                        // unitName = jsonData .name;

                        console.log(dat);
                        // const unitID = dat.id;
                        // const unitName = dat.name;

                    // optSelect += '<option value="${unitID}"> ${unitName}</option>';
                 });
                    // $('#unit_owner').html(optSelect);




                });
            });
        });





    </script>
</body>


@endsection








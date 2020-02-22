@extends('layouts.admin')

@section('title' , 'Reports')

@section('content')
<main class="columns is-desktop is-multiline is-centered" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="reports-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-centered is-fluid" id="reports-container">
                    <header class="table-header">
                        <div class="table-title">
                            <h2>Report's</h2>
                        </div>
                        <div class="table-option" id="reports-table-options">
                            <form id="reports-form" autocomplete="off">
                                <div class="columns is-desktop">
                                    <div class="column is-1-desktop" id="add-reports">
                                        <div class="columns is-desktop">
                                            <div class="column">
                                                <button class="button is-link is-small" id="reports-add-button">New
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-small">
                                                    <select id="reports-search-selected">
                                                        <option disabled>REPORT TYPE</option>
                                                        <option selected value="all">ALL</option>
                                                        @if(count($reportsData) > 0 && $reportsData)
                                                        @foreach($reportsData as $report)
                                                        <option value="{{$report->report_type}}">
                                                            {{strtoupper($report->report_type)}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="column is-12-mobile-is-12-tablet is-2-desktop is-2-widescreen is-2-fullhd">
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input is-small" id="reports-search" type="text"
                                                    placeholder="Search">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </header>
                    <div class="table-container">
                        <table class="table is-narrow is-fullwidth is-bordered is-hoverable" id="reports-table">
                            <thead>
                                <tr>
                                    <th class="has-text-centered">#</th>
                                    <th class="has-text-centered">REPORT NAME</th>
                                    <th class="has-text-centered">REPORT TYPE</th>
                                    <th class="has-text-centered">REPORT DESCRIPTION.</th>
                                    <th class="has-text-centered">UPLOADED BY</th>
                                    <th class="has-text-centered">UPLOADED DATE</th>
                                    <th class="has-text-centered">UPDATED DATE</th>
                                    @if(session('user_role') == 'admin')
                                    <th class="has-text-centered" colspan="2">OPTIONS</th>
                                    @elseif(session('user_role') == 'superadmin')
                                    <th class="has-text-centered" colspan="4">OPTIONS</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="reports-data">
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @if(session('user_role') == 'superadmin')
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="table-footer" id="reports-table-footer">
                        <div class="column is-12" id="pagination-container">
                            <nav class="pagination is-small" role="navigation" aria-label="pagination"
                                id="reports-pagination">
                                <a class="pagination-previous" id="paginate-prev"
                                    title="This is the first page">Previous</a>
                                <a class="pagination-next" id="paginate-next">Next</a>
                                <ul class="pagination-list" id="reports-pagination-list">
                                    <li>
                                        <a class="pagination-link is-current"
                                            style="background-color: transparent; border:1px solid transparent"
                                            aria-label="Page 1" aria-current="page">1</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
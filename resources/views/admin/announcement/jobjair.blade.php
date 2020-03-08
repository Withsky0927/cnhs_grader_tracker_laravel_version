@extends('..layouts.admin')

@section('title' , 'Job Fairs')

@section('content')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="jobfair-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-centered is-fluid" id="jobfair-container">
                    <header class="table-header">
                        <div class="table-title">
                            <h2>Job Fair's</h2>
                        </div>
                        <div class="table-option" id="jobfair-table-options">

                            <form id="jobfair-form" autocomplete="off">
                                <div class="columns is-desktop">
                                    <div class="column is-1-desktop" id="add-jobfair">
                                        <div class="columns is-desktop">
                                            <div class="column">
                                                <button class="button is-link is-small" id="jobfair-add-button">New
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-small">
                                                    <select id="jobfair-search-selected">
                                                        <option disabled>STRAND</option>
                                                        <option value="all">ALL</option>
                                                        @foreach($Strands as $strand)
                                                        <option value="{{$strand->strand_name}}">
                                                            {{strtoupper($strand->strand_name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="column is-12-mobile-is-12-tablet is-2-desktop is-2-widescreen is-2-fullhd">
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input is-small" id="jobfair-search" type="text"
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
                        <table class="table is-narrow is-fullwidth is-bordered is-hoverable" id="jobfair-table">
                            <thead>
                                <tr>
                                    <th class="has-text-centered">#</th>
                                    <th class="has-text-centered">COMPANY</th>
                                    <th class="has-text-centered">JOB</th>
                                    <th class="has-text-centered">STRAND</th>
                                    <th class="has-text-centered" colspan="3">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="jobfair-data">
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <footer class="table-footer" id="jobfair-table-footer">
                        <div class="column is-12" id="pagination-container">
                            <nav class="pagination is-small" role="navigation" aria-label="pagination"
                                id="jobfair-pagination">
                                <a class="pagination-previous" id="paginate-prev"
                                    title="This is the first page">Previous</a>
                                <a class="pagination-next" id="paginate-next">Next</a>
                                <ul class="pagination-list" id="jobfair-pagination-list">
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
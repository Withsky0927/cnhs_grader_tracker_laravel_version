@extends('..layouts.admin')

@section('title' , 'Scholarships')

@section('content')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="scholarships-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-centered is-fluid" id="scholarships-container">
                    <header class="table-header">
                        <div class="table-title">
                            <h2>Scholarships's</h2>
                        </div>
                        <div class="table-option" id="scholarships-table-options">

                            <form id="scholarships-form" autocomplete="off">
                                <div class="columns is-desktop">
                                    <div class="column is-1-desktop" id="add-scholarships">
                                        <div class="columns is-desktop">
                                            <div class="column">
                                                <button class="button is-link is-small" id="scholarships-add-button">New
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-small">
                                                    <select id="scholarships-search-selected">
                                                        <option disabled>SCHOOL</option>
                                                        <option value="all">ALL</option>
                                                        @if ($scholarshipData)
                                                        @foreach($scholarshipData as $scholar)
                                                        <option value="{{$scholar->school_name}}">
                                                            {{strtoupper($scholar->school_name)}}</option>
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
                                                <input class="input is-small" id="scholarships-search" type="text"
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
                        <table class="table is-narrow is-fullwidth is-bordered is-hoverable" id="scholarships-table">
                            <thead>
                                <tr>
                                    <th class="has-text-centered">#</th>
                                    <th class="has-text-centered">SCHOOL</th>
                                    <th class="has-text-centered">GRADE</th>
                                    <th class="has-text-centered">WEBSITE LINK</th>
                                    <th class="has-text-centered" colspan="3">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="scholarships-data">
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
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
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <footer class="table-footer" id="scholarships-table-footer">
                        <div class="column is-12" id="pagination-container">
                            <nav class="pagination is-small" role="navigation" aria-label="pagination"
                                id="scholarships-pagination">
                                <a class="pagination-previous" id="paginate-prev"
                                    title="This is the first page">Previous</a>
                                <a class="pagination-next" id="paginate-next">Next</a>
                                <ul class="pagination-list" id="scholarships-pagination-list">
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
<x-base-layout>
    <livewire:school.school-info-card/>

    <x-shared.general.main class="mb-5">
        <livewire:school.page-navigation/>
        <div class="row mx-0 px-0">
            <!-- LEFT SIDEBAR START -->
            <livewire:career-talks.reg-unis-page-left-sidebar :fair="$fair"/>
            <!-- LEFT SIDEBAR END -->
            <!-- Main Content -->
            <div class="col-lg-7 px-0">
                <livewire:career-talks.career-talk-registered-universities :fair="$fair"/>
            </div>
            <!-- end main content -->
            <!-- RIGHT SIDEBAR START -->
            <livewire:pages.components.sidebar.right-sidebar/>
            <!-- RIGHT SIDEBAR CLOSED -->
        </div>
    </x-shared.general.main>
</x-base-layout>

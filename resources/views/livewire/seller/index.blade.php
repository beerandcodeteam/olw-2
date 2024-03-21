<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 sm:px-6 lg:px-8">

            <x-heading
                    title="Seller"
                    description="A list of all the sellers."
                    btn-label="Add Seller"
                    :route="route('sellers.create')" />

            <div class="w-full overflow-hidden md:rounded-lg">
                <livewire:table
                        resource="Seller"
                        :columns="[
                            ['label' => 'Seller', 'column' => 'user.name'],
                            ['label' => 'Company','column' => 'company.name'],
                            ['label' => 'Email','column' => 'user.email'],
                        ]"
                        :eager-loading="['user', 'company']"
                        edit="sellers.edit"
                        delete="sellers.destroy"
                ></livewire:table>
            </div>

        </div>
    </div>
</div>